allokaBindReady( allokaInit );
loadModal();

function getProtocol() {
    if (typeof _alloka !== 'undefined') {
        if (typeof _alloka.server_host == 'undefined')
            _alloka.server_host = 'analytics.alloka.ru';
        if (_alloka.server_host == 'analytics.alloka.ru')
            return 'https://';
        else
            return 'http://';
    }
    else {
        return 'https://';
    }
}

function loadModal() {
    var protocol = getProtocol();
    var modal_css=document.createElement("link");
    modal_css.rel = "stylesheet";
    modal_css.type = "text/css";
    if (typeof _alloka == 'undefined' || typeof _alloka.server_host == 'undefined' ) {
        var server_host = 'analytics.alloka.ru';
    }
    else {
          var server_host = _alloka.server_host;
        }
    modal_css.href = protocol + server_host + '/assets/modal.css';
    document.getElementsByTagName("head")[0].appendChild(modal_css);
}

function leaveFeedback(data) {
    var xmlhttp = new XMLHttpRequest();
    var protocol = getProtocol();
    xmlhttp.open("POST", protocol + _alloka.server_host +'/api/site/feedback/', true);
    xmlhttp.setRequestHeader("Content-type", "application/json");
    data = JSON.stringify(data);
    xmlhttp.send(data);
}

function allokaInit()
{
    try
    {
        if (typeof _alloka !== 'undefined')
        {
            if (typeof _alloka.event_binded == 'undefined')
                _alloka.event_binded = true;
            else
                return;

            if (typeof _alloka.auto_substitute == 'undefined')
                _alloka.auto_substitute = true;

            if (_alloka.auto_substitute)
                allokaSubstitute();
        }
        else
        {
            allokaLanding();
        }
    }
    catch (error)
    {
        allokaLog(error);
    }
}

function allokaModal(data) {
    Modal.open({
    content: data,
    width: '60%'
    });
}


function allokaSubscribe(obj) {
    if (typeof Faye !== 'undefined') {
        console.log(obj.session_id);
        var protocol = getProtocol();

        var faye = new Faye.Client(protocol + _alloka.server_host + ':9292/faye');
        //var faye = new Faye.Client('http://' + 'localhost' + ':9292/faye');
        try {
            faye.unsubscribe('/client_notifications/' + obj.session_id);
            faye.unsubscribe('/client_notifications_js/' + obj.session_id);
        }
        catch (error) {
            allokaLog(error);
        }

        if (obj.feedback_popup_enabled) {
            faye.subscribe('/client_notifications/' + obj.session_id, function (data) {
                allokaModal(data);
            });
        }

        if (obj.feedback_js_enabled) {
            faye.subscribe('/client_notifications_js/' + obj.session_id, function (data) {
                var fn = window[data.name];
                if (typeof fn === 'function') {
                    fn(data.params);
                }
            });
        }
    }
    else
    {
        console.log("Faye is undefined");
    }
}

function allokaSubstitute()
{
    try
    {
        var cookie, referrer, search, cookie_name, cookie_prefix = 'aa_v4_';

        if (typeof _alloka == 'undefined')
            return false;

        allokaAddEvent(window, 'load', allokaSendGaClientId);

        if (typeof _alloka.server_host == 'undefined')
            _alloka.server_host = 'analytics.alloka.ru';


        if (typeof _alloka.last_source == 'undefined')
            _alloka.last_source = false;

        _alloka.is_mobile = allokaIsMobile();
        _alloka.cookie_prefix = cookie_prefix;

        if ( ! allokaIsArray(_alloka.trackable_source_types))
            _alloka.trackable_source_types = ['typein', 'referrer', 'utm'];

        for (var oid in _alloka.objects)
        {
            var obj, request_data;
            var track_typein, track_referrer, track_utm;

            obj = _alloka.objects[oid];
            obj.oid = oid;

            cookie_name = _alloka.cookie_prefix + oid;

            if (typeof obj.format == 'undefined')
                obj.format = '+7 (#{XXX}) #{XXX}-#{XX}-#{XX}';

            if (typeof obj.block_class == 'undefined')
                obj.block_class = 'phone_alloka';

            if (typeof obj.is_fixed_number == 'undefined')
                obj.is_fixed_number = false;

            if (allokaGetElementsByClassName(obj.block_class).length == 0)
                continue;

            allokaSetValueToBlocksByClass(obj.block_class, '', obj);

            if ((cookie = allokaGetCookie(_alloka.cookie_prefix + 'number_' + oid)) && typeof cookie !== '')
            {
                obj.cached_number = cookie;
                allokaSetValueToBlocksByClass(obj.block_class, obj.cached_number, obj);
            }
            else if (typeof obj.default_number !== 'undefined')
            {
                allokaSetValueToBlocksByClass(obj.block_class, obj.default_number, obj);
            }

            // Получаем данные из куки
            if (cookie = allokaGetCookie(cookie_name))
            {
                try
                {
                    cookie = JSON.parse(Base64.decode(cookie));

                    if (
                        allokaIsArray(cookie)
                        &&
                        cookie.length >= 3
                        &&
                        typeof cookie[0] != 'undefined'
                        &&
                        allokaIsString(cookie[0])
                        &&
                        cookie[0].length == 32
                    )
                    {
                        obj.session_id = (cookie[0].length ? cookie[0] : allokaGenerateSessionId());

                        //allokaSubscribe(obj);

                        if (typeof cookie[1] != 'undefined' && allokaIsString(cookie[1]) && cookie[1].length > 0 && allokaReferrerIsValid(cookie[1]))
                            referrer = cookie[1];
                        else
                            referrer = undefined;

                        if (typeof cookie[2] != 'undefined' && allokaIsString(cookie[2]) && cookie[2].length > 0)
                            search = cookie[2];
                        else
                            search = undefined;
                    }
                    else
                    {
                        cookie = undefined;
                    }
                }
                catch (error)
                {
                    cookie = undefined;
                }
            }

            // Если не удалость получить и распарсить куки — получаем новые данные
            if (_alloka.last_source == true || typeof cookie == 'undefined')
            {
                if (_alloka.last_source != true || typeof cookie == 'undefined')
                    obj.session_id = allokaGenerateSessionId();
                // TODO: МБ лучше передавать параметры с лендинга через куки?

                var landing_params = allokaGetUrlParameters(document.location.search.substr(1), ['alloka_referrer', 'alloka_search']);

                if (typeof landing_params != 'undefined' && allokaIsObject(landing_params) && landing_params.alloka_referrer)
                    referrer = unescape(landing_params.alloka_referrer);
                else if (document.referrer.length > 0 && allokaReferrerIsValid(document.referrer))
                    referrer = document.referrer;
                else if (_alloka.last_source != true || typeof cookie == 'undefined')
                    referrer = undefined;

                if (typeof landing_params != 'undefined' && allokaIsObject(landing_params) && landing_params.alloka_search)
                    search = unescape(landing_params.alloka_search);
                else if (document.location.search && document.location.search.length > 0)
                    search = document.location.search.substr(1);
                else if (_alloka.last_source != true || typeof cookie == 'undefined')
                    search = undefined;

                cookie = Base64.encode(JSON.stringify([obj.session_id, referrer, search]));

                allokaSetCookie(cookie_name, cookie, 1);
                //allokaSubscribe(obj);
            }

            // Определение типов отслеживаемых источников для конкретного объекта
            if (allokaIsArray(obj.trackable_source_types))
            {
                track_typein   = (obj.trackable_source_types.indexOf('typein') > -1);
                track_referrer = (obj.trackable_source_types.indexOf('referrer') > -1);
                track_utm      = (obj.trackable_source_types.indexOf('utm') > -1);
            }
            else
            {
                track_typein   = (_alloka.trackable_source_types.indexOf('typein') > -1);
                track_referrer = (_alloka.trackable_source_types.indexOf('referrer') > -1);
                track_utm      = (_alloka.trackable_source_types.indexOf('utm') > -1);
            }

            var referrer_found = false, utm_found = false;

            referrer_found = (referrer && referrer.length > 0);

            if (search && search.length > 0)
            {
                var url_parameters_found = allokaGetUrlParameters(search);

                if (allokaGetObjectSize(url_parameters_found))
                {
                    for (var parameter in url_parameters_found)
                    {
                        if (parameter.indexOf('utm_') > -1)
                        {
                            utm_found = true;
                            break;
                        }
                    }
                }
            }

            /*
             * Определение трекаемых источников
             * Не трекать если:
             * 1. Не трекается typein, причём нету ни referrer, ни utm
             * 2. Трекается только referrer, а его нет
             * 3. Трекается только utm, а его нет
             * 4. Не трекать referrer, а он есть
             * 5. Не трекать utm, а он есть
            */
            if
            (
                (
                    ! track_typein
                    &&
                    (
                        ( ! referrer_found && ! utm_found )
                        ||
                        ( ! referrer_found && track_referrer && ! track_utm )
                        ||
                        ( ! utm_found && track_utm && ! track_referrer )
                    )
                )
                // Не работал переход с баннеров. Из-за этого?
                //||
                //( ! track_referrer && referrer_found)
                //||
                //( ! track_utm && utm_found)
            )
            {
                allokaSetValueToBlocksByClass(obj.block_class, undefined, obj);
                continue;
            }

            // Запрет подмены по наличию/отсутствию URL-параметров
            if
            (
                (
                    typeof _alloka.url_params != 'undefined'
                    &&
                    ! allokaCheckParams(search, _alloka.url_params)
                )
                ||
                (
                    typeof obj.url_params != 'undefined'
                    &&
                    ! allokaCheckParams(search, obj.url_params)
                )
                ||
                (
                    typeof _alloka.deny_on_url_params != 'undefined'
                    &&
                    allokaCheckParams(search, _alloka.deny_on_url_params)
                )
                ||
                (
                    typeof obj.deny_on_url_params != 'undefined'
                    &&
                    allokaCheckParams(search, obj.deny_on_url_params)
                )
            )
            {
                allokaSetValueToBlocksByClass(obj.block_class, undefined, obj);
                continue;
            }

            // Запрет подмены по наличию/отсутствию некоторых доменов в реферрере
            if
            (
                (
                    typeof _alloka.referrer_domains != 'undefined'
                    &&
                    (
                        ! referrer_found
                        ||
                        ! allokaCheckDomain(referrer, _alloka.referrer_domains)
                    )
                )
                ||
                (
                    typeof obj.referrer_domains != 'undefined'
                    &&
                    (
                        ! referrer_found
                        ||
                        ! allokaCheckDomain(referrer, obj.referrer_domains)
                    )
                )
                ||
                (
                    referrer_found
                    &&
                    typeof _alloka.deny_on_referrer_domains != 'undefined'
                    &&
                    allokaCheckDomain(referrer, _alloka.deny_on_referrer_domains)
                )
                ||
                (
                    referrer_found
                    &&
                    typeof obj.deny_on_referrer_domains != 'undefined'
                    &&
                    allokaCheckDomain(referrer, obj.deny_on_referrer_domains)
                )
            )
            {
                allokaSetValueToBlocksByClass(obj.block_class, undefined, obj);
                continue;
            }

            // Подготовка данных для запросу к серверу Аллоки
            request_data =
            {
                oid: oid,
                session_id: obj.session_id
            };

            if (_alloka.custom_data && typeof _alloka.custom_data == 'object')
                request_data.custom_data = _alloka.custom_data;

            if (_alloka.url_parameters && typeof _alloka.url_parameters == 'object')
            {
                request_data.url_parameters = allokaGetUrlParameters(document.location.search.substr(1), _alloka.url_parameters);

                if (typeof request_data.url_parameters !== 'object')
                    delete request_data.url_parameters;
            }

            if (referrer && referrer.length > 0)
                request_data.referrer = referrer;

            if (search && search.length > 0)
                request_data.search = search;

            // Запрос к серверу Аллоки для конкретного объекта
            allokaMakeRequest('/api/site/retrieve_number', request_data, allokaHandleResponse);
        }

        // TODO — отключать отсылку GA Client ID если не произошла подмена номера
    }
    catch (error)
    {
        allokaLog(error);
    }
}

function allokaSendGaClientId()
{
    try
    {
        if (typeof _alloka != 'object')
            return;

	var ga_fallback;

	// fallback to simple call in case ga undefined
	if (typeof ga != 'undefined')
	    ga_fallback = ga;
	else
	    ga_fallback = function(f){f()};

	ga_fallback(function()
	{
	    var ga_client_id;

	    if (typeof ga != 'undefined')
		ga_client_id = ga.getAll()[0].get('clientId');

	    // fallback in case tracker is undefined
	    if ( ! ga_client_id) {
		console.log('get_ga_client_id fallback.');
		ga_client_id = allokaGetGoogleClientId();
	    }

	    if ( ! ga_client_id)
		return;

	    var delay = 500, repetitions = 5, i = 0, processed = 0;

	    if (typeof _alloka.objects_count == 'undefined') {
		_alloka.objects_count = 0;
		for (var k in _alloka.objects) _alloka.objects_count++;
	    }

	    var interval = setInterval(function()
	    {
		for (var oid in _alloka.objects)
		{
		    var request_data, obj = _alloka.objects[oid];

		    if (
			(typeof obj.ga_processed != 'undefined' && obj.ga_processed == true)
			||
			(typeof obj.success == 'undefined' || obj.success == false)
			||
			(typeof obj.session_id == 'undefined')
		    )
		    {
			continue;
		    }

		    if (typeof obj.is_fixed_number != 'undefined' && obj.is_fixed_number == true)
		    {
			obj.ga_processed = true;
			continue;
		    }

		    request_data = {
			oid:          obj.oid,
			session_id:   obj.session_id,
			ga_client_id: ga_client_id
		    };

		    allokaMakeRequest("/api/site/set_ga_client_id", request_data, allokaHandleGaResponse);
		    break;
		}

		processed = 0;

		for (var oid in _alloka.objects) {
		    if (_alloka.objects[oid].ga_processed || _alloka.objects[oid].failure) {
			processed++;
		    }
		}

		if (processed >= _alloka.objects_count)
		    clearInterval(interval);

		if (++i == repetitions) {
		    clearInterval(interval);
		}
	    }, delay);
	});
    }
    catch (error)
    {
        allokaLog(error);
    }
}

function allokaSendCustomData(oid, custom_data)
{
    try
    {
        if (typeof _alloka != 'object' || !allokaIsString(oid))
            return;

        var data, request_data, obj = _alloka.objects[oid];

        if ( typeof obj.session_id == 'undefined' )
        {
            allokaLog("'Can't send custom_data: number has not substituted" );
            return;
        }

        if (typeof custom_data != 'undefined') {
            data = custom_data
        }
        else {
            if (_alloka.custom_data && typeof _alloka.custom_data == 'object')
                data = _alloka.custom_data;
        }

        request_data = {
            oid:          obj.oid,
            session_id:   obj.session_id,
            custom_data: data
        };

        if (typeof data !== 'undefined') {
            allokaMakeRequest("/api/site/set_custom_data", request_data, allokaHandleCsResponse);
        }

    }
    catch (error)
    {
        allokaLog(error);
    }
}

function allokaHandleCsResponse(responseText, status, oid)
{
    try
    {
        var response, obj;

        obj = _alloka.objects[oid];

        if (status == 200 || status == 422)
        {
            if (allokaIsObject(responseText))
            {
                response = responseText;
            }
            else if (allokaIsString(responseText) && allokaJsonAvailable())
            {
                response = JSON.parse(responseText);
            }
            else
            {
                throw 'unable_to_parse_response';
                return;
            }

        }
    }
    catch (error)
    {
        allokaLog(error);
    }
}

function allokaHandleGaResponse(responseText, status, oid)
{
    try
    {
        var response, obj;

        obj = _alloka.objects[oid];

        if (status == 200 || status == 422)
        {
            if (allokaIsObject(responseText))
            {
                response = responseText;
            }
            else if (allokaIsString(responseText) && allokaJsonAvailable())
            {
                response = JSON.parse(responseText);
            }
            else
            {
                throw 'unable_to_parse_response';
                return;
            }

            if (typeof response.success != 'undefined' && response.success == true) {
                obj.ga_processed = true;
            }
        }
    }
    catch (error)
    {
        allokaLog(error);
    }
}

function allokaLanding()
{
    try
    {
        var cookie, referrer, search, cookie_name, cookie_prefix = 'aa_v4_', class_name = 'alloka_link';
        var blocks = document.getElementsByClassName(class_name);

        if (blocks.length)
        {
            cookie_name = cookie_prefix + 'landing';

            // Получаем данные из куки
            if (cookie = allokaGetCookie(cookie_name))
            {
                try
                {
                    cookie = JSON.parse(Base64.decode(cookie));

                    if (allokaIsArray(cookie) && cookie.length >= 2)
                    {
                        if (typeof cookie[0] != 'undefined' && allokaIsString(cookie[0]) && cookie[0].length > 0 && allokaReferrerIsValid(cookie[0]))
                            referrer = cookie[0];
                        else
                            referrer = undefined;

                        if (typeof cookie[1] != 'undefined' && allokaIsString(cookie[1]) && cookie[1].length > 0)
                            search = cookie[1];
                        else
                            search = undefined;
                    }
                    else
                    {
                        cookie = undefined;
                    }
                }
                catch (error)
                {
                    cookie = undefined;
                }
            }

            // Если не удалость получить и распарсить куки — получаем новые данные
            if (typeof cookie == 'undefined')
            {
                if (document.referrer.length > 0 && allokaReferrerIsValid(document.referrer))
                    referrer = document.referrer;
                else
                    referrer = undefined;

                if (document.location.search && document.location.search.length)
                    search = document.location.search.substr(1);
                else
                    search = undefined;

                cookie = Base64.encode(JSON.stringify([referrer, search]));

                allokaSetCookie(cookie_name, cookie, 1);
            }

            if (search && search.length)
                search = 'alloka_search=' + escape(search);

            if (referrer && referrer.length)
                search = (search && search.length ? search + '&' : '' ) + 'alloka_referrer=' + escape(referrer);

            if (search && search.length)
            {
                for (block in blocks)
                {
                    if (typeof blocks[block] == 'object')
                    {
                        var b, href_old, href, onclick, onclick_old;

                        b = blocks[block];
                        href_old = b.getAttribute('href');
                        onclick_old = b.getAttribute('onclick');

                        href = (href_old && href_old.length) ? (href_old + (href_old.indexOf('?') == -1 ? '?' : '&') + search) : ('?' + search);

                        onclick = "this.setAttribute('href', '" + href + "')";

                        if (onclick_old && onclick_old.length)
                        {
                            onclick_old = onclick_old.replace(href_old, href);
                            b.setAttribute('onclick', onclick + '; ' + onclick_old);
                        }
                        else
                        {
                            b.setAttribute('onclick', onclick);
                        }
                    }
                }
            }
        }
    }
    catch (error)
    {
        allokaLog(error);
    }
}

function allokaGetUrlParameters(search, filter)
{
    var result = {}, data;

//    if (typeof _alloka !== 'undefined' && typeof _alloka.cached_url_parameters !== 'undefined')
//    {
//        result = _alloka.cached_url_parameters;
//    }
//    else
//    {
        if (search && allokaIsString(search) && search.length > 0)
        {
            data = search.split('&');

            for (var i = 0; i < data.length; i++)
            {
                var item = data[i].split('=');
                result[item[0]] = item[1];
            }
        }
//    }

//    if (typeof _alloka !== 'undefined' && typeof _alloka.cached_url_parameters === 'undefined')
//        _alloka.cached_url_parameters = result;

    if (typeof filter === 'object')
    {
        var new_result = {};

        for (var i in result) {
            if (filter.indexOf(i) >= 0)
                new_result[i] = result[i];
        }

        result = new_result;
    }

    var length = 0;
    for (var i in result) {
        length++;
    }
    if (length == 0)
        return undefined;

    return result;
}

function allokaCheckParams(search, url_params)
{
    if (allokaIsArray(url_params))
    {
        var obtained_params = allokaGetUrlParameters(search, url_params);
        return (allokaGetObjectSize(obtained_params) == allokaGetObjectSize(url_params));
    }
    else if (allokaIsObject(url_params))
    {
        var url_params_keys = allokaGetObjectKeys(url_params);
        var obtained_params = allokaGetUrlParameters(search, url_params_keys);

        if (allokaIsObject(obtained_params) && allokaGetObjectSize(obtained_params) == allokaGetObjectSize(url_params))
        {
            for (var key in url_params)
            {
                if (allokaIsArray(url_params[key]))
                {
                    for (var sub_key in url_params[key])
                    {
                        if
                        (
                            typeof url_params[key][sub_key] != 'undefined'
                            &&
                            typeof obtained_params[key] != 'undefined'
                            &&
                            url_params[key][sub_key].toString() == obtained_params[key].toString()
                        )
                        {
                            return true;
                        }
                    }

                    return false;
                }
                else
                {
                    if
                    (
                        typeof url_params[key] == 'undefined'
                        ||
                        typeof obtained_params[key] == 'undefined'
                        ||
                        url_params[key].toString() != obtained_params[key].toString()
                    )
                    {
                        return false;
                    }
                }
            }

            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}

function allokaGetDomainFromUrl(url)
{
    var domain;
    var matches = url.match(/^(http|https)?\:\/\/([^\/?#]+)?(?:[\/?#]|$)/i);

    if (allokaIsArray(matches) && matches[2].length > 0)
        domain = matches[2];
    else
        return null;

    if (domain.indexOf(':') != -1)
        domain = domain.split(':').shift();

    if (domain.indexOf('www.') == 0)
        domain = domain.substr(4);

    return domain;
}

function allokaCheckDomain(url, specified_domains)
{
    var obtained_domain = allokaGetDomainFromUrl(url);

    if (allokaIsArray(specified_domains))
    {
        for (var i in specified_domains)
        {
            if (allokaSameDomain(obtained_domain, specified_domains[i]))
            {
                return true;
            }
        }
    }
    else if (allokaIsString(specified_domains))
    {
        return allokaSameDomain(obtained_domain, specified_domains);
    }

    return false;
}

function allokaSameDomain(domain_1, domain_2)
{
    return (
        domain_1 == domain_2
        ||
        ('www.' + domain_1) == domain_2
        ||
        domain_1 == ('www.' + domain_2)
    );
}

function allokaSetCookie(name, value, expires)
{
    if (expires === undefined) {
        document.cookie = name + '=' + escape(value) + '; path=/;';
    }
    else {
        var now = new Date();
        now.setDate(now.getDate() + expires);
        document.cookie = name + '=' + escape(value) + ';expires=' + now + '; path=/;';
    }
}

function allokaGetCookie(name)
{
    var i, x, y, ARRcookies = document.cookie.split(';');

    for ( i = 0; i < ARRcookies.length; i++)
    {
        x = ARRcookies[i].substr(0, ARRcookies[i].indexOf('='));
        y = ARRcookies[i].substr(ARRcookies[i].indexOf('=') + 1);
        x = x.replace(/^\s+|\s+$/g, '');

        if (x == name)
        {
            return unescape(y);
        }
    }

    return undefined;
}

function allokaMakeRequest(path, data, callback, time_limit)
{
    if ( ! allokaJsonAvailable())
    {
        throw 'unsupported_browser';
        return;
    }

    var timeout, obj, url, request;

    time_limit = time_limit ? time_limit : 10000;

    if (typeof data !== 'object') {
        data = {};
    }

    if (data['oid']) {
        obj = _alloka.objects[data['oid']];
    }

    data['location'] = document.location.toString();

    // IE 9 and lower
    if (allokaDetectCORS() == 2 && false)
    {
//        data['xdr'] = '1';
//        data = JSON.stringify(data);

//        if (typeof data !== 'string' || data.length <= 0) {
//            throw 'json_stringify_failure';
//            return;
//        }

        url = 'http://' + _alloka.server_host + path;

        request = new XDomainRequest();

        request.open('POST', url);
        request.timeout = time_limit;

        request.onload = function() {
            callback(request.responseText, 200, obj.oid);
        };

        request.onerror = function() {
            allokaLog('request failed to ' + url);

            if (typeof data['ga_client_id'] == 'undefined') {
                obj.failure = true;
                allokaSetValueToBlocksByClass(obj.block_class, undefined, obj);
            }
        };

        request.ontimeout = function() {
            allokaLog('request timeout to ' + url);

            if (typeof data['ga_client_id'] == 'undefined') {
                obj.failure = true;
                allokaSetValueToBlocksByClass(obj.block_class, undefined, obj);
            }
        };

//        request.onprogress = function(e){/*var percentComplete = (e.position / e.totalSize)*100;*/};

        request.send(Base64.encode(JSON.stringify(data)));
    }
    // Modern Browsers
    else if (allokaDetectCORS() == 1)
    {
        data = JSON.stringify(data);

        if (typeof data !== 'string' || data.length <= 0) {
            throw 'json_stringify_failure';
        }

        var protocol = getProtocol();

        url = protocol + _alloka.server_host + path; // fix

        var XMLHttpFactories = [
            function () { return new XMLHttpRequest() },
            function () { return new ActiveXObject('Msxml2.XMLHTTP') },
            function () { return new ActiveXObject('Msxml3.XMLHTTP') },
            function () { return new ActiveXObject('Microsoft.XMLHTTP') }
        ];

        for (var i = 0; i < XMLHttpFactories.length; i++) {
            try {
                request = XMLHttpFactories[i]();
            }
            catch (e) {
                continue;
            }
            break;
        }

        if ( ! request)
            return;

        request.open('POST', url, true);

        request.timeout = time_limit;

        request.setRequestHeader('Content-Type', 'application/json');

        request.setRequestHeader('Accept', 'application/json');

        request.onreadystatechange = function ()
        {
            if (request.readyState == 4) {
//                clearTimeout(timeout);

                if (callback && typeof callback === 'function')
                    callback(request.responseText, request.status, obj.oid);
            }
        };

        request.onerror = function() {
            allokaLog('request failed to ' + url);

            if (typeof data['ga_client_id'] == 'undefined') {
                obj.failure = true;
                allokaSetValueToBlocksByClass(obj.block_class, undefined, obj);
            }
        };

        request.ontimeout = function() {
            allokaLog('request timeout to ' + url);

            if (typeof data['ga_client_id'] == 'undefined') {
                obj.failure = true;
                allokaSetValueToBlocksByClass(obj.block_class, undefined, obj);
            }
        };

        request.send(data);

//        timeout = setTimeout(function () {
//            request.abort();
//
//            if (obj) {
//                obj.failure = true;
//                allokaSetValueToBlocksByClass(obj.block_class, undefined, obj);
//            }
//        }, time_limit);
    }
    // Others crappy "browsers"
    else // if (allokaDetectCORS() == 0 || true)
    {
        url = 'http://' + _alloka.server_host + path + '?callback=' + callback.toString().match(/^function\s*([^\s(]+)/)[1];

//        for (var i in data)
//        {
//            if (typeof data[i] == 'object')
//            {
//                for (var j in data[i])
//                {
//                    url += '&' + i + '[' + j + ']=' + Base64.encode(data[i][j]);
//                }
//            }
//            else
//            {
//                if (['oid', 'session_id', 'ga_client_id'].indexOf(i) == -1)
//                    url += '&' + i + '=' + Base64.encode(data[i]);
//                else
//                    url += '&' + i + '=' + data[i];
//            }
//        }

        url += '&data=' + Base64.encode(JSON.stringify(data));

        var jsonp = document.createElement('script');
        jsonp.type = 'text/javascript';
        jsonp.src = url;

        document.getElementsByTagName('head')[0].appendChild(jsonp);
    }
}

function allokaHandleResponse(responseText, status, oid)
{
    try
    {
        var number, response, obj;

        obj = _alloka.objects[oid];

        if (status == 200 || status == 422)
        {
            if (allokaIsObject(responseText))
            {
                response = responseText;
            }
            else if (allokaIsString(responseText) && allokaJsonAvailable())
            {
                response = JSON.parse(responseText);
            }
            else
            {
                throw 'unable_to_parse_response';
                allokaSetValueToBlocksByClass(obj.block_class, undefined, obj);
                return;
            }
        }
        else if (status != 200)
        {
            allokaSetValueToBlocksByClass(obj.block_class, undefined, obj);
            return;
        }

        if (response.data === undefined || typeof response.data !== 'object' || typeof response.errors === 'object')
        {
            if (typeof response.errors === 'string')
                response.errors = [[response.errors]];

            for (var i in response.errors)
            {
                allokaLog(response.errors[i].join(', '), obj);
            }
        }

        if (
            typeof response.data === 'object'
            && allokaIsString(response.data.number)
            && response.data.number.length >= 6
            && typeof response.errors !== 'object'
        )
        {
            obj.success = true;
            obj.is_fixed_number = (typeof response.data.is_fixed_number != 'undefined');
            if (
                typeof response.data.feedback_popup_enabled != 'undefined'
                && response.data.feedback_popup_enabled === true
            )
            {
                obj.feedback_popup_enabled = true
            }
            if (
                typeof response.data.feedback_js_enabled != 'undefined'
                && response.data.feedback_js_enabled === true
            )
            {
                obj.feedback_js_enabled = true
            }

            if (obj.feedback_popup_enabled || obj.feedback_js_enabled)
                allokaSubscribe(obj);

            number = response.data.number.substr(1);

            if (obj.cached_number === undefined || number != obj.cached_number) {
                allokaSetCookie(_alloka.cookie_prefix + 'number_' + obj.oid, number);
            }
            else
                return;
        }
        else
            number = undefined;

        allokaSetValueToBlocksByClass(obj.block_class, number, obj);
    }
    catch (error)
    {
        allokaLog(error);
    }
}

function allokaSetValueToBlocksByClass(class_name, value, obj)
{
    var blocks = allokaGetElementsByClassName(class_name);

    if (typeof class_name == 'object') {
        for (var i = 0; i < class_name.length; i++) {
            blocks = blocks.concat(Array.prototype.slice.call(document.getElementsByClassName(class_name[i])));
        }
        blocks = allokaArrayUnique(blocks);
    }
    else
        blocks = document.getElementsByClassName(class_name);

    for (var i = 0; i < blocks.length; i++)
    {
        if (value === '')
        {
            blocks[i].setAttribute('data-phone', escape(blocks[i].innerHTML));
            blocks[i].innerHTML = '&nbsp;';
        }
        else if (value === undefined)
        {
            //BUG: If set deny rule (for example deny_on_url_params) script disable ALL sending GaClientID
            //allokaRemoveEvent(window, 'load', allokaSendGaClientId);

            if (blocks[i].getAttribute('data-phone') != undefined)
            {
                blocks[i].innerHTML = unescape(blocks[i].getAttribute('data-phone'));

                if (allokaGetCookie(_alloka.cookie_prefix + 'number_' + obj.oid))
                    allokaSetCookie(_alloka.cookie_prefix + 'number_' + obj.oid, '', -1);
            }
        }
        else
        {
            var formatted_number = allokaFormatPhone(value, obj.format);

            if (_alloka.is_mobile)
            {
                var attributes = '';

                for (var j = 0; j < blocks[i].attributes.length; j++)
                {
                    if (blocks[i].attributes[j].name != 'href')
                    {
                        attributes += blocks[i].attributes[j].name + '="' + blocks[i].attributes[j].value + '" ';
                    }
                }

                blocks[i].outerHTML = '<a ' + attributes.trim() + ' href="tel:+' + formatted_number.replace(/\D/g, '') + '" style="cursor: default; text-decoration: none; cursor: default;">' + formatted_number + '</a>';
            }
            else
            {
                blocks[i].innerHTML = formatted_number;
            }
        }
    }
}

function allokaGenerateSessionId()
{
    var uid = function()
    {
        return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
    };
    return uid() + uid() + uid() + uid() + uid() + uid() + uid() + uid();
}

function allokaFormatPhone(value, format)
{
    var regexp = "";
    var matches = format.match(/#{(X)+}/ig);
    var output_format = format;

    for (var i = 0; i < matches.length; i++)
    {
        output_format = output_format.replace(/#{(X)+}/i, "$$" + (i + 1))
        regexp += "(" + matches[i].slice(2, -1).replace(/(X)/ig, "\\d") + ")";
    }

    regexp = new RegExp(regexp);

    return value.replace(regexp, output_format);
}

function allokaBindReady(handler)
{
    var called = false;

    function ready()
    {
        if (called)
            return called = true;

        handler();
    }

    if (document.addEventListener)
    {
        // native event
        document.addEventListener("DOMContentLoaded", ready, false)
    }
    else if (document.attachEvent)
    {
        // IE
        try
        {
            var isFrame = window.frameElement != null;
        }
        catch(e)
        {
        }

        if (document.documentElement.doScroll && !isFrame)
        {
            // IE, the document is not inside a frame
            function tryScroll()
            {
                if (called)
                    return false;
                try
                {
                    document.documentElement.doScroll("left");
                    ready();
                }
                catch(e)
                {
                    setTimeout(tryScroll, 10);
                }
            }

            tryScroll();
        }

        document.attachEvent("onreadystatechange", function()
        {
            // IE, the document is inside a frame
            if (document.readyState === "complete")
            {
                ready();
            }
        })
    }
    else if (window.addEventListener) {
        window.addEventListener('load', ready, false)
    }
    else if (window.attachEvent) {
        window.attachEvent('onload', ready)
    }
    else
    {
        var fn = window.onload// very old browser, copy old onload
        window.onload = function()
        {
            // replace by new onload and call the old one
            fn && fn();
            ready();
        }
    }
}

function allokaGetElementsByClassName(class_name)
{
    var blocks = [];

    if (typeof class_name == 'object') {
        for (var i = 0; i < class_name.length; i++) {
            blocks = blocks.concat(Array.prototype.slice.call(document.getElementsByClassName(class_name[i])));
        }
        blocks = allokaArrayUnique(blocks);
    }
    else
        blocks = document.getElementsByClassName(class_name);

    return blocks;
}

function allokaGetGoogleClientId()
{
    var ga_client_id;

    var ga = allokaGetCookie('_ga');

    if (typeof ga !== 'undefined' && ga.length > 0)
    {
        ga_client_id = ga.split('.').slice(2, 4).join('.');
        return (ga_client_id.length > 0? ga_client_id : null);
    }

    var utma = allokaGetCookie('__utma');

    if (typeof utma !== 'undefined' && utma.length > 0)
    {
        ga_client_id = utma.split('.').slice(1,3).join('.');
        return (ga_client_id.length > 0 ? ga_client_id : null);
    }

    return null;
}

function allokaIsMobile()
{
    return navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|Symbian|Nokia|IEMobile|MeeGo|Maemo/i) != null;
}

function allokaReferrerIsValid(referrer)
{
    var url_parts = referrer.split('://');
    url_parts.shift();

    return referrer
        &&
        referrer.length > 0
        &&
        url_parts[0].toString().indexOf(document.location.host) != 0;
}

function allokaLog(error, obj)
{
    if (typeof error != 'undefined')
    {
        var error_message;

        if (typeof error.stack != 'undefined' && error.stack.length > 0)
            error_message = error.stack;
        else if (typeof error.message != 'undefined' && error.message.length > 0)
            error_message = error.message;
        else
            error_message = error;

        if (['invalid_oid', 'order_not_found', 'inactive_order', 'inactive_object', 'ip_address_blocked', 'unable_to_retrieve_a_number'].indexOf(error_message) == -1) {
            allokaRemoteErrorLog(error_message, obj);
        }

        error_message = 'Alloka error: ' + error_message;

        if (typeof console != 'undefined')
            console.log(error_message);
        else if (typeof window.console != 'undefined')
            window.console.log(error_message);
    }
}

function allokaRemoteErrorLog(error_message, obj)
{
    var url = 'http://' + _alloka.server_host + '/api/site/error_log';

    url += '?msg=' + error_message;

    if (typeof obj == 'object')
        url += '&oid=' + obj.oid;

    url += '&location=' + Base64.encode(document.location.toString());

    var pixel = document.createElement('img');
    pixel.src = url;
}

function allokaDetectCORS()
{
    if (typeof XMLHttpRequest != 'undefined' && 'withCredentials' in new XMLHttpRequest())
        return 1;
    else if (window.XDomainRequest)
        return 2;
    else
        return 0;
}

function allokaAddEvent(element, event, fn) {
    if (element.addEventListener)
        element.addEventListener(event, fn, false);
    else if (element.attachEvent)
        element.attachEvent('on' + event, fn);
}

function allokaRemoveEvent(element, event, fn) {
    if (element.removeEventListener)
        element.removeEventListener(event, fn, false);
    else if (element.detachEvent)
        element.detachEvent('on' + event, fn);
}

function allokaIsArray(object)
{
    return (typeof object != 'undefined' && Object.prototype.toString.call(object) === '[object Array]')
}

function allokaIsObject(object)
{
    return (typeof object != 'undefined' && Object.prototype.toString.call(object) === '[object Object]')
}

function allokaIsString(object)
{
    return (typeof object != 'undefined' && Object.prototype.toString.call(object) === '[object String]')
}

function allokaArrayUnique(array)
{
    if (allokaIsArray(array))
    {
        var a = array.concat();

        for (var i = 0; i < a.length; ++i)
        {
            for (var j = i + 1; j < a.length; ++j)
            {
                if (a[i] === a[j])
                    a.splice(j--, 1);
            }
        }

        return a;
    }
    else
    {
        return false;
    }
}

function allokaGetObjectSize(the_object)
{
    if (allokaIsObject(the_object) || allokaIsArray(the_object))
    {
        var object_size = 0;

        for (key in the_object)
        {
            if (the_object.hasOwnProperty(key))
            {
                object_size++;
            }
        }

        return object_size;
    }
    else
    {
        return NaN;
    }
}

function allokaGetObjectKeys(the_object)
{
    if (allokaIsObject(the_object))
    {
        var keys = [];

        for (var k in the_object)
        {
            keys.push(k);
        }

        return keys;
    }
    else
    {
        return undefined;
    }
}

function allokaJsonAvailable()
{
    return (typeof JSON === 'object' && typeof JSON.stringify === 'function' && typeof JSON.parse === 'function');
}


/*
 document.getElementsByClassName()
*/
if ( ! document.getElementsByClassName)
{
    document.getElementsByClassName = function(classname)
    {
        var elArray = [];
        var tmp = document.getElementsByTagName("*");
        var regex = new RegExp("(^|\\s)" + classname + "(\\s|$)");
        for (var i = 0; i < tmp.length; i++)
        {
            if (regex.test(tmp[i].className))
            {
                elArray.push(tmp[i]);
            }
        }

        return elArray;
    };
}

/*
 Array.indexOf()
*/
if ( ! ('indexOf' in Array.prototype)) {
    Array.prototype.indexOf= function(find, i /*opt*/) {
        if (i===undefined) i= 0;
        if (i<0) i+= this.length;
        if (i<0) i= 0;
        for (var n= this.length; i<n; i++)
            if (i in this && this[i]===find)
                return i;
        return -1;
    };
}

/*
 String.trim()
*/
if (typeof String.prototype.trim !== 'function') {
    String.prototype.trim = function() {
        return this.replace(/^\s+|\s+$/g, '');
    }
}







try
{
    /*
      Base64 - encode/decode
    */

    var Base64 = {
    // private property
        _keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

    // public method for encoding
        encode : function (input) {
            var output = "";
            var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
            var i = 0;

            input = Base64._utf8_encode(input);

            while (i < input.length) {

                chr1 = input.charCodeAt(i++);
                chr2 = input.charCodeAt(i++);
                chr3 = input.charCodeAt(i++);

                enc1 = chr1 >> 2;
                enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
                enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
                enc4 = chr3 & 63;

                if (isNaN(chr2)) {
                    enc3 = enc4 = 64;
                } else if (isNaN(chr3)) {
                    enc4 = 64;
                }

                output = output +
                    Base64._keyStr.charAt(enc1) + Base64._keyStr.charAt(enc2) +
                    Base64._keyStr.charAt(enc3) + Base64._keyStr.charAt(enc4);

            }

            return output;
        },

    // public method for decoding
        decode : function (input) {
            var output = "";
            var chr1, chr2, chr3;
            var enc1, enc2, enc3, enc4;
            var i = 0;

            input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

            while (i < input.length) {

                enc1 = Base64._keyStr.indexOf(input.charAt(i++));
                enc2 = Base64._keyStr.indexOf(input.charAt(i++));
                enc3 = Base64._keyStr.indexOf(input.charAt(i++));
                enc4 = Base64._keyStr.indexOf(input.charAt(i++));

                chr1 = (enc1 << 2) | (enc2 >> 4);
                chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
                chr3 = ((enc3 & 3) << 6) | enc4;

                output = output + String.fromCharCode(chr1);

                if (enc3 != 64) {
                    output = output + String.fromCharCode(chr2);
                }
                if (enc4 != 64) {
                    output = output + String.fromCharCode(chr3);
                }

            }

            output = Base64._utf8_decode(output);

            return output;

        },

    // private method for UTF-8 encoding
        _utf8_encode : function (string) {
            string = string.replace(/\r\n/g,"\n");
            var utftext = "";

            for (var n = 0; n < string.length; n++) {

                var c = string.charCodeAt(n);

                if (c < 128) {
                    utftext += String.fromCharCode(c);
                }
                else if((c > 127) && (c < 2048)) {
                    utftext += String.fromCharCode((c >> 6) | 192);
                    utftext += String.fromCharCode((c & 63) | 128);
                }
                else {
                    utftext += String.fromCharCode((c >> 12) | 224);
                    utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                    utftext += String.fromCharCode((c & 63) | 128);
                }

            }

            return utftext;
        },

    // private method for UTF-8 decoding
        _utf8_decode : function (utftext) {
            var string = "";
            var i = 0;
            var c = c1 = c2 = 0;

            while ( i < utftext.length ) {

                c = utftext.charCodeAt(i);

                if (c < 128) {
                    string += String.fromCharCode(c);
                    i++;
                }
                else if((c > 191) && (c < 224)) {
                    c2 = utftext.charCodeAt(i+1);
                    string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                    i += 2;
                }
                else {
                    c2 = utftext.charCodeAt(i+1);
                    c3 = utftext.charCodeAt(i+2);
                    string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                    i += 3;
                }

            }
            return string;
        }
    }


    /*
     JSON - stringify/parse
     Create a JSON object only if one does not already exist. We create the
     methods in a closure to avoid creating global variables.
    */

    if (typeof JSON !== 'object') {
        JSON = {};
    }

    (function () {
        'use strict';

        function f(n) {
            // Format integers to have at least two digits.
            return n < 10 ? '0' + n : n;
        }

        if (typeof Date.prototype.toJSON !== 'function') {

            Date.prototype.toJSON = function () {

                return isFinite(this.valueOf())
                    ? this.getUTCFullYear()     + '-' +
                        f(this.getUTCMonth() + 1) + '-' +
                        f(this.getUTCDate())      + 'T' +
                        f(this.getUTCHours())     + ':' +
                        f(this.getUTCMinutes())   + ':' +
                        f(this.getUTCSeconds())   + 'Z'
                    : null;
            };

            String.prototype.toJSON      =
                Number.prototype.toJSON  =
                Boolean.prototype.toJSON = function () {
                    return this.valueOf();
                };
        }

        var cx,
            escapable,
            gap,
            indent,
            meta,
            rep;


        function quote(string) {

    // If the string contains no control characters, no quote characters, and no
    // backslash characters, then we can safely slap some quotes around it.
    // Otherwise we must also replace the offending characters with safe escape
    // sequences.

            escapable.lastIndex = 0;
            return escapable.test(string) ? '"' + string.replace(escapable, function (a) {
                var c = meta[a];
                return typeof c === 'string'
                    ? c
                    : '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
            }) + '"' : '"' + string + '"';
        }


        function str(key, holder) {

    // Produce a string from holder[key].

            var i,          // The loop counter.
                k,          // The member key.
                v,          // The member value.
                length,
                mind = gap,
                partial,
                value = holder[key];

    // If the value has a toJSON method, call it to obtain a replacement value.

            if (value && typeof value === 'object' &&
                    typeof value.toJSON === 'function') {
                value = value.toJSON(key);
            }

    // If we were called with a replacer function, then call the replacer to
    // obtain a replacement value.

            if (typeof rep === 'function') {
                value = rep.call(holder, key, value);
            }

    // What happens next depends on the value's type.

            switch (typeof value) {
            case 'string':
                return quote(value);

            case 'number':

    // JSON numbers must be finite. Encode non-finite numbers as null.

                return isFinite(value) ? String(value) : 'null';

            case 'boolean':
            case 'null':

    // If the value is a boolean or null, convert it to a string. Note:
    // typeof null does not produce 'null'. The case is included here in
    // the remote chance that this gets fixed someday.

                return String(value);

    // If the type is 'object', we might be dealing with an object or an array or
    // null.

            case 'object':

    // Due to a specification blunder in ECMAScript, typeof null is 'object',
    // so watch out for that case.

                if (!value) {
                    return 'null';
                }

    // Make an array to hold the partial results of stringifying this object value.

                gap += indent;
                partial = [];

    // Is the value an array?

                if (Object.prototype.toString.apply(value) === '[object Array]') {

    // The value is an array. Stringify every element. Use null as a placeholder
    // for non-JSON values.

                    length = value.length;
                    for (i = 0; i < length; i += 1) {
                        partial[i] = str(i, value) || 'null';
                    }

    // Join all of the elements together, separated with commas, and wrap them in
    // brackets.

                    v = partial.length === 0
                        ? '[]'
                        : gap
                        ? '[\n' + gap + partial.join(',\n' + gap) + '\n' + mind + ']'
                        : '[' + partial.join(',') + ']';
                    gap = mind;
                    return v;
                }

    // If the replacer is an array, use it to select the members to be stringified.

                if (rep && typeof rep === 'object') {
                    length = rep.length;
                    for (i = 0; i < length; i += 1) {
                        if (typeof rep[i] === 'string') {
                            k = rep[i];
                            v = str(k, value);
                            if (v) {
                                partial.push(quote(k) + (gap ? ': ' : ':') + v);
                            }
                        }
                    }
                } else {

    // Otherwise, iterate through all of the keys in the object.

                    for (k in value) {
                        if (Object.prototype.hasOwnProperty.call(value, k)) {
                            v = str(k, value);
                            if (v) {
                                partial.push(quote(k) + (gap ? ': ' : ':') + v);
                            }
                        }
                    }
                }

    // Join all of the member texts together, separated with commas,
    // and wrap them in braces.

                v = partial.length === 0
                    ? '{}'
                    : gap
                    ? '{\n' + gap + partial.join(',\n' + gap) + '\n' + mind + '}'
                    : '{' + partial.join(',') + '}';
                gap = mind;
                return v;
            }
        }

    // If the JSON object does not yet have a stringify method, give it one.

        if (typeof JSON.stringify !== 'function') {
            escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;
            meta = {    // table of character substitutions
                '\b': '\\b',
                '\t': '\\t',
                '\n': '\\n',
                '\f': '\\f',
                '\r': '\\r',
                '"' : '\\"',
                '\\': '\\\\'
            };
            JSON.stringify = function (value, replacer, space) {

    // The stringify method takes a value and an optional replacer, and an optional
    // space parameter, and returns a JSON text. The replacer can be a function
    // that can replace values, or an array of strings that will select the keys.
    // A default replacer method can be provided. Use of the space parameter can
    // produce text that is more easily readable.

                var i;
                gap = '';
                indent = '';

    // If the space parameter is a number, make an indent string containing that
    // many spaces.

                if (typeof space === 'number') {
                    for (i = 0; i < space; i += 1) {
                        indent += ' ';
                    }

    // If the space parameter is a string, it will be used as the indent string.

                } else if (typeof space === 'string') {
                    indent = space;
                }

    // If there is a replacer, it must be a function or an array.
    // Otherwise, throw an error.

                rep = replacer;
                if (replacer && typeof replacer !== 'function' &&
                        (typeof replacer !== 'object' ||
                        typeof replacer.length !== 'number')) {
                    throw new Error('JSON.stringify');
                }

    // Make a fake root object containing our value under the key of ''.
    // Return the result of stringifying the value.

                return str('', {'': value});
            };
        }


    // If the JSON object does not yet have a parse method, give it one.

        if (typeof JSON.parse !== 'function') {
            cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;
            JSON.parse = function (text, reviver) {

    // The parse method takes a text and an optional reviver function, and returns
    // a JavaScript value if the text is a valid JSON text.

                var j;

                function walk(holder, key) {

    // The walk method is used to recursively walk the resulting structure so
    // that modifications can be made.

                    var k, v, value = holder[key];
                    if (value && typeof value === 'object') {
                        for (k in value) {
                            if (Object.prototype.hasOwnProperty.call(value, k)) {
                                v = walk(value, k);
                                if (v !== undefined) {
                                    value[k] = v;
                                } else {
                                    delete value[k];
                                }
                            }
                        }
                    }
                    return reviver.call(holder, key, value);
                }


    // Parsing happens in four stages. In the first stage, we replace certain
    // Unicode characters with escape sequences. JavaScript handles many characters
    // incorrectly, either silently deleting them, or treating them as line endings.

                text = String(text);
                cx.lastIndex = 0;
                if (cx.test(text)) {
                    text = text.replace(cx, function (a) {
                        return '\\u' +
                            ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
                    });
                }

    // In the second stage, we run the text against regular expressions that look
    // for non-JSON patterns. We are especially concerned with '()' and 'new'
    // because they can cause invocation, and '=' because it can cause mutation.
    // But just to be safe, we want to reject all unexpected forms.

    // We split the second stage into 4 regexp operations in order to work around
    // crippling inefficiencies in IE's and Safari's regexp engines. First we
    // replace the JSON backslash pairs with '@' (a non-JSON character). Second, we
    // replace all simple value tokens with ']' characters. Third, we delete all
    // open brackets that follow a colon or comma or that begin the text. Finally,
    // we look to see that the remaining characters are only whitespace or ']' or
    // ',' or ':' or '{' or '}'. If that is so, then the text is safe for eval.

                if (/^[\],:{}\s]*$/
                        .test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@')
                            .replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']')
                            .replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {

    // In the third stage we use the eval function to compile the text into a
    // JavaScript structure. The '{' operator is subject to a syntactic ambiguity
    // in JavaScript: it can begin a block or an object literal. We wrap the text
    // in parens to eliminate the ambiguity.

                    j = eval('(' + text + ')');

    // In the optional fourth stage, we recursively walk the new structure, passing
    // each name/value pair to a reviver function for possible transformation.

                    return typeof reviver === 'function'
                        ? walk({'': j}, '')
                        : j;
                }

    // If the text is not JSON parseable, then a SyntaxError is thrown.

                throw new SyntaxError('JSON.parse');
            };
        }
    }());
}
catch (error)
{
    allokaLog(error);
}
