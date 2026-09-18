<div id='message'>
	<p>
		#.
	</p>
	<h2># This is the main Apache HTTP server configuration file.</h2>
	<p>
		It contains the.
	</p>
	<h3>configuration directives that give the server its instructions.</h3>
	<pre class='indent-c'><code class='block'># See &lt;URL:http://httpd.apache.org/docs/2.4/&gt; for detailed information.</code></pre>
	<h3>In particular, see.</h3>
	<pre class='indent-c'><code class='block'># &lt;URL:http://httpd.apache.org/docs/2.4/mod/directives.html&gt;</code></pre>
	<h3>for a discussion of each configuration directive.</h3>
	<p>
		#.
	</p>
	<h3>Do NOT simply read the instructions in here without understanding.</h3>
	<h2># what they do.</h2>
	<p>
		They're here only as hints or reminders. If you are unsure.
	</p>
	<h3>consult the online docs. You have been warned.</h3>
	<p>
		#.
	</p>
	<p>
		<strong># Configuration and logfile names.</strong> If the filenames you specify for many.
	</p>
	<h3>of the server's control files begin with "/" (or "drive:/" for Win32), the.</h3>
	<h2># server will use that explicit path.</h2>
	<p>
		If the filenames do *not* begin.
	</p>
	<h3>with "/", the value of ServerRoot is prepended -- so "logs/access_log".</h3>
	<h3>with ServerRoot set to "/usr/local/apache2" will be interpreted by the.</h3>
	<h3>server as "/usr/local/apache2/logs/access_log", whereas "/logs/access_log".</h3>
	<h3>will be interpreted as '/logs/access_log'.</h3>
	<p>
		#.
	</p>
	<p>
		<strong># NOTE.</strong> Where filenames are specified, you must use forward slashes.
	</p>
	<h3>instead of backslashes (e.g., "c:/apache" instead of "c:\apache").</h3>
	<h3>If a drive letter is omitted, the drive on which httpd.exe is located.</h3>
	<h2># will be used by default.</h2>
	<p>
		It is recommended that you always supply.
	</p>
	<h3>an explicit drive letter in absolute paths to avoid confusion.</h3>
	<p>
		#.
	</p>
	<p>
		<strong># ServerRoot.</strong> The top of the directory tree under which the server's.
	</p>
	<h3>configuration, error, and log files are kept.</h3>
	<p>
		#.
	</p>
	<h2># Do not add a slash at the end of the directory path.</h2>
	<p>
		If you point.
	</p>
	<h3>ServerRoot at a non-local disk, be sure to specify a local disk on the.</h3>
	<h2># Mutex directive, if file-based mutexes are used.</h2>
	<p>
		If you wish to share the.
	</p>
	<h3>same ServerRoot for multiple httpd daemons, you will need to change at.</h3>
	<h3>least PidFile.</h3>
	<p>
		#.
	</p>
	<p>
		Define SRVROOT "c:/Programs/Apache/httpd".
	</p>
	<p>
		Define DOCROOT "c:/ProgramData/Apache/httpd".
	</p>
	<pre class='indent-c'><code class='block'>ServerRoot "${SRVROOT}"</code></pre>
	<p>
		#.
	</p>
	<p>
		<strong># Mutex.</strong> Allows you to set the mutex mechanism and mutex file directory.
	</p>
	<h3>for individual mutexes, or change the global defaults.</h3>
	<p>
		#.
	</p>
	<h3>Uncomment and change the directory if mutexes are file-based and the default.</h3>
	<h3>mutex file directory is not on a local disk or is not appropriate for some.</h3>
	<h3>other reason.</h3>
	<p>
		#.
	</p>
	<h3>Mutex default:logs.</h3>
	<p>
		#.
	</p>
	<p>
		<strong># Listen.</strong> Allows you to bind Apache to specific IP addresses and/or.
	</p>
	<pre class='indent-c'><code class='block'># ports, instead of the default. See also the &lt;VirtualHost&gt;</code></pre>
	<h3>directive.</h3>
	<p>
		#.
	</p>
	<h3>Change this to Listen on specific IP addresses as shown below to.</h3>
	<h3>prevent Apache from glomming onto all bound IP addresses.</h3>
	<p>
		#.
	</p>
	<p>
		#Listen 12.34.56.78:80.
	</p>
	<p>
		Listen 80.
	</p>
	<p>
		#.
	</p>
	<h3>Dynamic Shared Object (DSO) Support.</h3>
	<p>
		#.
	</p>
	<h3>To be able to use the functionality of a module which was built as a DSO you.</h3>
	<h3>have to place corresponding `LoadModule' lines at this location so the.</h3>
	<h3>directives contained in it are actually available _before_ they are used.</h3>
	<pre class='indent-c'><code class='block'># Statically compiled modules (those listed by `httpd -l') do not need</code></pre>
	<h3>to be loaded here.</h3>
	<p>
		#.
	</p>
	<h2># Example</h2>
	<h3>LoadModule foo_module modules/mod_foo.so.</h3>
	<p>
		#.
	</p>
	<p>
		LoadModule access_compat_module modules/mod_access_compat.so.
	</p>
	<p>
		LoadModule actions_module modules/mod_actions.so.
	</p>
	<p>
		LoadModule alias_module modules/mod_alias.so.
	</p>
	<p>
		LoadModule allowmethods_module modules/mod_allowmethods.so.
	</p>
	<p>
		LoadModule asis_module modules/mod_asis.so.
	</p>
	<p>
		LoadModule auth_basic_module modules/mod_auth_basic.so.
	</p>
	<p>
		#LoadModule auth_digest_module modules/mod_auth_digest.so.
	</p>
	<p>
		#LoadModule auth_form_module modules/mod_auth_form.so.
	</p>
	<p>
		#LoadModule authn_anon_module modules/mod_authn_anon.so.
	</p>
	<p>
		LoadModule authn_core_module modules/mod_authn_core.so.
	</p>
	<p>
		#LoadModule authn_dbd_module modules/mod_authn_dbd.so.
	</p>
	<p>
		#LoadModule authn_dbm_module modules/mod_authn_dbm.so.
	</p>
	<p>
		LoadModule authn_file_module modules/mod_authn_file.so.
	</p>
	<p>
		#LoadModule authn_socache_module modules/mod_authn_socache.so.
	</p>
	<p>
		#LoadModule authnz_fcgi_module modules/mod_authnz_fcgi.so.
	</p>
	<p>
		#LoadModule authnz_ldap_module modules/mod_authnz_ldap.so.
	</p>
	<p>
		LoadModule authz_core_module modules/mod_authz_core.so.
	</p>
	<p>
		#LoadModule authz_dbd_module modules/mod_authz_dbd.so.
	</p>
	<p>
		#LoadModule authz_dbm_module modules/mod_authz_dbm.so.
	</p>
	<p>
		LoadModule authz_groupfile_module modules/mod_authz_groupfile.so.
	</p>
	<p>
		LoadModule authz_host_module modules/mod_authz_host.so.
	</p>
	<p>
		#LoadModule authz_owner_module modules/mod_authz_owner.so.
	</p>
	<p>
		LoadModule authz_user_module modules/mod_authz_user.so.
	</p>
	<p>
		LoadModule autoindex_module modules/mod_autoindex.so.
	</p>
	<p>
		#LoadModule brotli_module modules/mod_brotli.so.
	</p>
	<p>
		#LoadModule buffer_module modules/mod_buffer.so.
	</p>
	<p>
		#LoadModule cache_module modules/mod_cache.so.
	</p>
	<p>
		#LoadModule cache_disk_module modules/mod_cache_disk.so.
	</p>
	<p>
		#LoadModule cache_socache_module modules/mod_cache_socache.so.
	</p>
	<p>
		#LoadModule cern_meta_module modules/mod_cern_meta.so.
	</p>
	<p>
		LoadModule cgi_module modules/mod_cgi.so.
	</p>
	<p>
		#LoadModule charset_lite_module modules/mod_charset_lite.so.
	</p>
	<p>
		#LoadModule data_module modules/mod_data.so.
	</p>
	<p>
		#LoadModule dav_module modules/mod_dav.so.
	</p>
	<p>
		#LoadModule dav_fs_module modules/mod_dav_fs.so.
	</p>
	<p>
		#LoadModule dav_lock_module modules/mod_dav_lock.so.
	</p>
	<p>
		#LoadModule dbd_module modules/mod_dbd.so.
	</p>
	<p>
		#LoadModule deflate_module modules/mod_deflate.so.
	</p>
	<p>
		LoadModule dir_module modules/mod_dir.so.
	</p>
	<p>
		#LoadModule dumpio_module modules/mod_dumpio.so.
	</p>
	<p>
		LoadModule env_module modules/mod_env.so.
	</p>
	<p>
		#LoadModule expires_module modules/mod_expires.so.
	</p>
	<p>
		#LoadModule ext_filter_module modules/mod_ext_filter.so.
	</p>
	<p>
		#LoadModule file_cache_module modules/mod_file_cache.so.
	</p>
	<p>
		#LoadModule filter_module modules/mod_filter.so.
	</p>
	<p>
		#LoadModule http2_module modules/mod_http2.so.
	</p>
	<p>
		LoadModule headers_module modules/mod_headers.so.
	</p>
	<p>
		#LoadModule heartbeat_module modules/mod_heartbeat.so.
	</p>
	<p>
		#LoadModule heartmonitor_module modules/mod_heartmonitor.so.
	</p>
	<p>
		#LoadModule ident_module modules/mod_ident.so.
	</p>
	<p>
		#LoadModule imagemap_module modules/mod_imagemap.so.
	</p>
	<p>
		LoadModule include_module modules/mod_include.so.
	</p>
	<p>
		#LoadModule info_module modules/mod_info.so.
	</p>
	<p>
		LoadModule isapi_module modules/mod_isapi.so.
	</p>
	<p>
		#LoadModule lbmethod_bybusyness_module modules/mod_lbmethod_bybusyness.so.
	</p>
	<p>
		#LoadModule lbmethod_byrequests_module modules/mod_lbmethod_byrequests.so.
	</p>
	<p>
		#LoadModule lbmethod_bytraffic_module modules/mod_lbmethod_bytraffic.so.
	</p>
	<p>
		#LoadModule lbmethod_heartbeat_module modules/mod_lbmethod_heartbeat.so.
	</p>
	<p>
		#LoadModule ldap_module modules/mod_ldap.so.
	</p>
	<p>
		#LoadModule logio_module modules/mod_logio.so.
	</p>
	<p>
		LoadModule log_config_module modules/mod_log_config.so.
	</p>
	<p>
		#LoadModule log_debug_module modules/mod_log_debug.so.
	</p>
	<p>
		#LoadModule log_forensic_module modules/mod_log_forensic.so.
	</p>
	<p>
		#LoadModule lua_module modules/mod_lua.so.
	</p>
	<p>
		#LoadModule macro_module modules/mod_macro.so.
	</p>
	<p>
		#LoadModule md_module modules/mod_md.so.
	</p>
	<p>
		LoadModule mime_module modules/mod_mime.so.
	</p>
	<p>
		#LoadModule mime_magic_module modules/mod_mime_magic.so.
	</p>
	<p>
		LoadModule negotiation_module modules/mod_negotiation.so.
	</p>
	<p>
		#LoadModule proxy_module modules/mod_proxy.so.
	</p>
	<p>
		#LoadModule proxy_ajp_module modules/mod_proxy_ajp.so.
	</p>
	<p>
		#LoadModule proxy_balancer_module modules/mod_proxy_balancer.so.
	</p>
	<p>
		#LoadModule proxy_connect_module modules/mod_proxy_connect.so.
	</p>
	<p>
		#LoadModule proxy_express_module modules/mod_proxy_express.so.
	</p>
	<p>
		#LoadModule proxy_fcgi_module modules/mod_proxy_fcgi.so.
	</p>
	<p>
		#LoadModule proxy_ftp_module modules/mod_proxy_ftp.so.
	</p>
	<p>
		#LoadModule proxy_hcheck_module modules/mod_proxy_hcheck.so.
	</p>
	<p>
		#LoadModule proxy_html_module modules/mod_proxy_html.so.
	</p>
	<p>
		#LoadModule proxy_http_module modules/mod_proxy_http.so.
	</p>
	<p>
		#LoadModule proxy_http2_module modules/mod_proxy_http2.so.
	</p>
	<p>
		#LoadModule proxy_scgi_module modules/mod_proxy_scgi.so.
	</p>
	<p>
		#LoadModule proxy_uwsgi_module modules/mod_proxy_uwsgi.so.
	</p>
	<p>
		#LoadModule proxy_wstunnel_module modules/mod_proxy_wstunnel.so.
	</p>
	<p>
		#LoadModule ratelimit_module modules/mod_ratelimit.so.
	</p>
	<p>
		#LoadModule reflector_module modules/mod_reflector.so.
	</p>
	<p>
		#LoadModule remoteip_module modules/mod_remoteip.so.
	</p>
	<p>
		#LoadModule request_module modules/mod_request.so.
	</p>
	<p>
		#LoadModule reqtimeout_module modules/mod_reqtimeout.so.
	</p>
	<p>
		LoadModule rewrite_module modules/mod_rewrite.so.
	</p>
	<p>
		#LoadModule sed_module modules/mod_sed.so.
	</p>
	<p>
		LoadModule session_module modules/mod_session.so.
	</p>
	<p>
		LoadModule session_cookie_module modules/mod_session_cookie.so.
	</p>
	<p>
		#LoadModule session_crypto_module modules/mod_session_crypto.so.
	</p>
	<p>
		#LoadModule session_dbd_module modules/mod_session_dbd.so.
	</p>
	<p>
		LoadModule setenvif_module modules/mod_setenvif.so.
	</p>
	<p>
		#LoadModule slotmem_plain_module modules/mod_slotmem_plain.so.
	</p>
	<p>
		#LoadModule slotmem_shm_module modules/mod_slotmem_shm.so.
	</p>
	<p>
		#LoadModule socache_dbm_module modules/mod_socache_dbm.so.
	</p>
	<p>
		#LoadModule socache_memcache_module modules/mod_socache_memcache.so.
	</p>
	<p>
		#LoadModule socache_redis_module modules/mod_socache_redis.so.
	</p>
	<p>
		LoadModule socache_shmcb_module modules/mod_socache_shmcb.so.
	</p>
	<p>
		#LoadModule speling_module modules/mod_speling.so.
	</p>
	<p>
		LoadModule ssl_module modules/mod_ssl.so.
	</p>
	<p>
		#LoadModule status_module modules/mod_status.so.
	</p>
	<p>
		#LoadModule substitute_module modules/mod_substitute.so.
	</p>
	<p>
		#LoadModule unique_id_module modules/mod_unique_id.so.
	</p>
	<p>
		#LoadModule userdir_module modules/mod_userdir.so.
	</p>
	<p>
		#LoadModule usertrack_module modules/mod_usertrack.so.
	</p>
	<p>
		#LoadModule version_module modules/mod_version.so.
	</p>
	<p>
		#LoadModule vhost_alias_module modules/mod_vhost_alias.so.
	</p>
	<p>
		#LoadModule watchdog_module modules/mod_watchdog.so.
	</p>
	<p>
		#LoadModule xml2enc_module modules/mod_xml2enc.so.
	</p>
	<pre class='indent-c'><code class='block'>&lt;IfModule unixd_module&gt;</code></pre>
	<p>
		#.
	</p>
	<h3>If you wish httpd to run as a different user or group, you must run.</h3>
	<h3>httpd as root initially and it will switch.</h3>
	<p>
		#.
	</p>
	<p>
		<strong># User/Group.</strong> The name (or #number) of the user/group to run httpd as.
	</p>
	<h3>It is usually good practice to create a dedicated user and group for.</h3>
	<h3>running httpd, as with most system services.</h3>
	<p>
		#.
	</p>
	<p>
		User daemon.
	</p>
	<p>
		Group daemon.
	</p>
	<pre class='indent-c'><code class='block'>&lt;/IfModule&gt;</code></pre>
	<h3>'Main' server configuration.</h3>
	<p>
		#.
	</p>
	<h3>The directives in this section set up the values used by the 'main'.</h3>
	<h3>server, which responds to any requests that aren't handled by a.</h3>
	<pre class='indent-c'><code class='block'># &lt;VirtualHost&gt; definition.  These values also provide defaults for</code></pre>
	<pre class='indent-c'><code class='block'># # any &lt;VirtualHost&gt; containers you may define later in the file.</code></pre>
	<p>
		#.
	</p>
	<pre class='indent-c'><code class='block'># All of these directives may appear inside &lt;VirtualHost&gt; containers,</code></pre>
	<h3>in which case these default settings will be overridden for the.</h3>
	<h3>virtual host being defined.</h3>
	<p>
		#.
	</p>
	<p>
		#.
	</p>
	<p>
		<strong># ServerAdmin.</strong> Your address, where problems with the server should be.
	</p>
	<h2># e-mailed.</h2>
	<p>
		This address appears on some server-generated pages, such.
	</p>
	<h2># as error documents.</h2>
	<p>
		For example, admin@your-domain.com.
	</p>
	<p>
		#.
	</p>
	<p>
		ServerAdmin admin@example.com.
	</p>
	<p>
		#.
	</p>
	<h3>ServerName gives the name and port that the server uses to identify itself.</h3>
	<h3>This can often be determined automatically, but we recommend you specify.</h3>
	<h3>it explicitly to prevent problems during startup.</h3>
	<p>
		#.
	</p>
	<h3>If your host doesn't have a registered DNS name, enter its IP address here.</h3>
	<p>
		#.
	</p>
	<p>
		ServerName localhost:80.
	</p>
	<p>
		#.
	</p>
	<h3>Deny access to the entirety of your server's filesystem. You must.</h3>
	<h3>explicitly permit access to web content directories in other.</h3>
	<pre class='indent-c'><code class='block'># &lt;Directory&gt; blocks below.</code></pre>
	<p>
		#.
	</p>
	<pre class='indent-c'><code class='block'>&lt;Directory /&gt;</code></pre>
	<p>
		AllowOverride All.
	</p>
	<p>
		Require all denied.
	</p>
	<pre class='indent-c'><code class='block'>&lt;Directory &lt;/Directory&gt;</code></pre>
	<p>
		#.
	</p>
	<h3>Note that from this point forward you must specifically allow.</h3>
	<h3>particular features to be enabled - so if something's not working as.</h3>
	<h3>you might expect, make sure that you have specifically enabled it.</h3>
	<h3>below.</h3>
	<p>
		#.
	</p>
	<p>
		#.
	</p>
	<p>
		<strong># DocumentRoot.</strong> The directory out of which you will serve your.
	</p>
	<h3>documents. By default, all requests are taken from this directory, but.</h3>
	<h3>symbolic links and aliases may be used to point to other locations.</h3>
	<p>
		#.
	</p>
	<pre class='indent-c'><code class='block'>DocumentRoot "${DOCROOT}/htdocs"</code></pre>
	<pre class='indent-c'><code class='block'>DocumentRoot &lt;Directory "${DOCROOT}/htdocs"&gt;</code></pre>
	<p>
		#.
	</p>
	<h3>Possible values for the Options directive are "None", "All",.</h3>
	<h3>or any combination of:</h3>
	<h3>Indexes Includes FollowSymLinks SymLinksifOwnerMatch ExecCGI MultiViews.</h3>
	<p>
		#.
	</p>
	<h3>Note that "MultiViews" must be named *explicitly* --- "Options All".</h3>
	<h3>doesn't give it to you.</h3>
	<p>
		#.
	</p>
	<h3>The Options directive is both complicated and important. Please see.</h3>
	<h3>http://httpd.apache.org/docs/2.4/mod/core.html#options.</h3>
	<h3>for more information.</h3>
	<p>
		#.
	</p>
	<p>
		Options Indexes FollowSymLinks.
	</p>
	<p>
		#.
	</p>
	<h3>AllowOverride controls what directives may be placed in .htaccess files.</h3>
	<h2># It can be "All", "None", or any combination of the keywords</h2>
	<h2>#</h2>
	<p>
		AllowOverride FileInfo AuthConfig Limit.
	</p>
	<p>
		#.
	</p>
	<p>
		AllowOverride All.
	</p>
	<p>
		#.
	</p>
	<h3>Controls who can get stuff from this server.</h3>
	<p>
		#.
	</p>
	<p>
		Require all granted.
	</p>
	<pre class='indent-c'><code class='block'>&lt;/Directory&gt;</code></pre>
	<p>
		#.
	</p>
	<p>
		<strong># DirectoryIndex.</strong> Sets the file that Apache will serve if a directory.
	</p>
	<h3>is requested.</h3>
	<p>
		#.
	</p>
	<pre class='indent-c'><code class='block'>&lt;IfModule dir_module&gt;</code></pre>
	<p>
		DirectoryIndex index.html, index.php.
	</p>
	<pre class='indent-c'><code class='block'>&lt;IfModule &lt;/IfModule&gt;</code></pre>
	<p>
		#.
	</p>
	<h3>The following lines prevent .htaccess and .htpasswd files from being.</h3>
	<h3>viewed by Web clients.</h3>
	<p>
		#.
	</p>
	<pre class='indent-c'><code class='block'>&lt;Files ".ht*"&gt;</code></pre>
	<p>
		Require all denied.
	</p>
	<pre class='indent-c'><code class='block'>&lt;Files &lt;/Files&gt;</code></pre>
	<p>
		#.
	</p>
	<p>
		<strong># ErrorLog.</strong> The location of the error log file.
	</p>
	<pre class='indent-c'><code class='block'># If you do not specify an ErrorLog directive within a &lt;VirtualHost&gt;</code></pre>
	<h3>container, error messages relating to that virtual host will be.</h3>
	<pre class='indent-c'><code class='block'># logged here.  If you *do* define an error logfile for a &lt;VirtualHost&gt;</code></pre>
	<h3>container, that host's errors will be logged there and not here.</h3>
	<p>
		#.
	</p>
	<p>
		ErrorLog "logs/error.log".
	</p>
	<p>
		#.
	</p>
	<p>
		<strong># LogLevel.</strong> Control the number of messages logged to the error_log.
	</p>
	<p>
		<strong># Possible values include.</strong> Debug, info, notice, warn, error, crit,.
	</p>
	<h3>alert, emerg.</h3>
	<p>
		#.
	</p>
	<p>
		LogLevel warn.
	</p>
	<pre class='indent-c'><code class='block'>&lt;IfModule log_config_module&gt;</code></pre>
	<p>
		#.
	</p>
	<h3>The following directives define some format nicknames for use with.</h3>
	<h3>a CustomLog directive (see below).</h3>
	<p>
		#.
	</p>
	<p>
		LogFormat "%h %l %u %t \"%r\" %&gt;s %b \"%{Referer}i\" \"%{User-Agent}i\"" combined.
	</p>
	<p>
		LogFormat "%h %l %u %t \"%r\" %&gt;s %b" common.
	</p>
	<pre class='indent-c'><code class='block'>&lt;IfModule logio_module&gt;</code></pre>
	<h3>You need to enable mod_logio.c to use %I and %O.</h3>
	<p>
		LogFormat "%h %l %u %t \"%r\" %&gt;s %b \"%{Referer}i\" \"%{User-Agent}i\" %I %O" combinedio.
	</p>
	<pre class='indent-c'><code class='block'>&lt;IfModule &lt;/IfModule&gt;</code></pre>
	<p>
		#.
	</p>
	<h3>The location and format of the access logfile (Common Logfile Format).</h3>
	<pre class='indent-c'><code class='block'># If you do not define any access logfiles within a &lt;VirtualHost&gt;</code></pre>
	<h2># container, they will be logged here.</h2>
	<p>
		Contrariwise, if you *do*.
	</p>
	<pre class='indent-c'><code class='block'># # define per-&lt;VirtualHost&gt; access logfiles, transactions will be</code></pre>
	<h3>logged therein and *not* in this file.</h3>
	<p>
		#.
	</p>
	<p>
		CustomLog "logs/access.log" common.
	</p>
	<p>
		#.
	</p>
	<h3>If you prefer a logfile with access, agent, and referer information.</h3>
	<h3>(Combined Logfile Format) you can use the following directive.</h3>
	<p>
		#.
	</p>
	<p>
		#CustomLog "logs/access.log" combined.
	</p>
	<pre class='indent-c'><code class='block'>&lt;/IfModule&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;IfModule alias_module&gt;</code></pre>
	<p>
		#.
	</p>
	<h3>Redirect: Allows you to tell clients about documents that used to.</h3>
	<h3>exist in your server's namespace, but do not anymore. The client.</h3>
	<h3>will make a new request for the document at its new location.</h3>
	<h3>Example:</h3>
	<h3>Redirect permanent /foo http://www.example.com/bar.</h3>
	<p>
		#.
	</p>
	<p>
		<strong># Alias.</strong> Maps web paths into filesystem paths and is used to.
	</p>
	<h3>access content that does not live under the DocumentRoot.</h3>
	<h2># Example</h2>
	<h3>Alias /webpath /full/filesystem/path.</h3>
	<p>
		#.
	</p>
	<h3>If you include a trailing / on /webpath then the server will.</h3>
	<h2># require it to be present in the URL.</h2>
	<p>
		You will also likely.
	</p>
	<pre class='indent-c'><code class='block'># need to provide a &lt;Directory&gt; section to allow access to</code></pre>
	<h3>the filesystem path.</h3>
	<p>
		#.
	</p>
	<p>
		<strong># ScriptAlias.</strong> This controls which directories contain server scripts.
	</p>
	<h3>ScriptAliases are essentially the same as Aliases, except that.</h3>
	<h3>documents in the target directory are treated as applications and.</h3>
	<h3>run by the server when requested rather than as documents sent to the.</h3>
	<h2># client.</h2>
	<p>
		The same rules about trailing "/" apply to ScriptAlias.
	</p>
	<h3>directives as to Alias.</h3>
	<p>
		#.
	</p>
	<pre class='indent-c'><code class='block'>ScriptAlias /cgi-bin/ "${SRVROOT}/cgi-bin/"</code></pre>
	<pre class='indent-c'><code class='block'>&lt;/IfModule&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;IfModule cgid_module&gt;</code></pre>
	<p>
		#.
	</p>
	<h3>ScriptSock: On threaded servers, designate the path to the UNIX.</h3>
	<h3>socket used to communicate with the CGI daemon of mod_cgid.</h3>
	<p>
		#.
	</p>
	<p>
		#Scriptsock cgisock.
	</p>
	<pre class='indent-c'><code class='block'>&lt;IfModule &lt;/IfModule&gt;</code></pre>
	<p>
		#.
	</p>
	<pre class='indent-c'><code class='block'># "${SRVROOT}/cgi-bin" should be changed to whatever your ScriptAliased</code></pre>
	<h3>CGI directory exists, if you have that configured.</h3>
	<p>
		#.
	</p>
	<pre class='indent-c'><code class='block'>&lt;Directory "${SRVROOT}/cgi-bin"&gt;</code></pre>
	<p>
		AllowOverride None.
	</p>
	<p>
		Options None.
	</p>
	<p>
		Require all granted.
	</p>
	<pre class='indent-c'><code class='block'>&lt;Directory &lt;/Directory&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;IfModule headers_module&gt;</code></pre>
	<p>
		#.
	</p>
	<h3>Avoid passing HTTP_PROXY environment to CGI's on this or any proxied.</h3>
	<h3>backend servers which have lingering "httpoxy" defects.</h3>
	<h3>'Proxy' request header is undefined by the IETF, not listed by IANA.</h3>
	<p>
		#.
	</p>
	<p>
		RequestHeader unset Proxy early.
	</p>
	<pre class='indent-c'><code class='block'>&lt;IfModule &lt;/IfModule&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;IfModule mime_module&gt;</code></pre>
	<p>
		#.
	</p>
	<h3>TypesConfig points to the file containing the list of mappings from.</h3>
	<h3>filename extension to MIME-type.</h3>
	<p>
		#.
	</p>
	<p>
		TypesConfig conf/mime.types.
	</p>
	<p>
		#.
	</p>
	<h3>AddType allows you to add to or override the MIME configuration.</h3>
	<h3>file specified in TypesConfig for specific file types.</h3>
	<p>
		#.
	</p>
	<p>
		#AddType application/x-gzip .tgz.
	</p>
	<p>
		#.
	</p>
	<h3>AddEncoding allows you to have certain browsers uncompress.</h3>
	<p>
		<strong># information on the fly. Note.</strong> Not all browsers support this.
	</p>
	<p>
		#.
	</p>
	<p>
		#AddEncoding x-compress .Z.
	</p>
	<p>
		#AddEncoding x-gzip .gz .tgz.
	</p>
	<p>
		#.
	</p>
	<h3>If the AddEncoding directives above are commented-out, then you.</h3>
	<h2># probably should define those extensions to indicate media types</h2>
	<p>
		#.
	</p>
	<p>
		AddType application/x-compress .Z.
	</p>
	<p>
		AddType application/x-gzip .gz .tgz.
	</p>
	<p>
		#.
	</p>
	<h2># AddHandler allows you to map certain file extensions to "handlers"</h2>
	<h3>actions unrelated to filetype. These can be either built into the server.</h3>
	<h3>or added with the Action directive (see below).</h3>
	<p>
		#.
	</p>
	<h2># To use CGI scripts outside of ScriptAliased directories</h2>
	<h3>(You will also need to add "ExecCGI" to the "Options" directive.).</h3>
	<p>
		#.
	</p>
	<p>
		#AddHandler cgi-script .cgi.
	</p>
	<h2># For type maps (negotiated resources)</h2>
	<p>
		#AddHandler type-map var.
	</p>
	<p>
		#.
	</p>
	<h3>Filters allow you to process content before it is sent to the client.</h3>
	<p>
		#.
	</p>
	<h2># To parse .shtml files for server-side includes (SSI)</h2>
	<h3>(You will also need to add "Includes" to the "Options" directive.).</h3>
	<p>
		#.
	</p>
	<p>
		#AddType text/html .shtml.
	</p>
	<p>
		#AddOutputFilter INCLUDES .shtml.
	</p>
	<pre class='indent-c'><code class='block'>&lt;/IfModule&gt;</code></pre>
	<p>
		#.
	</p>
	<h3>The mod_mime_magic module allows the server to use various hints from the.</h3>
	<h2># contents of the file itself to determine its type.</h2>
	<p>
		The MIMEMagicFile.
	</p>
	<h3>directive tells the module where the hint definitions are located.</h3>
	<p>
		#.
	</p>
	<p>
		#MIMEMagicFile conf/magic.
	</p>
	<p>
		#.
	</p>
	<h2># Customizable error responses come in three flavors</h2>
	<h3>1) plain text 2) local redirects 3) external redirects.</h3>
	<p>
		#.
	</p>
	<h2># Some examples</h2>
	<p>
		#ErrorDocument 500 "The server made a boo boo.".
	</p>
	<p>
		#ErrorDocument 404 /missing.html.
	</p>
	<p>
		#ErrorDocument 404 "/cgi-bin/missing_handler.pl".
	</p>
	<p>
		#ErrorDocument 402 http://www.example.com/subscription_info.html.
	</p>
	<p>
		#.
	</p>
	<p>
		#.
	</p>
	<p>
		<strong># MaxRanges.</strong> Maximum number of Ranges in a request before.
	</p>
	<h3>returning the entire resource, or one of the special.</h3>
	<h3>values 'default', 'none' or 'unlimited'.</h3>
	<h3>Default setting is to accept 200 Ranges.</h3>
	<p>
		#MaxRanges unlimited.
	</p>
	<p>
		#.
	</p>
	<p>
		<strong># EnableMMAP and EnableSendfile.</strong> On systems that support it,.
	</p>
	<h3>memory-mapping or the sendfile syscall may be used to deliver.</h3>
	<h2># files.</h2>
	<p>
		This usually improves server performance, but must.
	</p>
	<h3>be turned off when serving from networked-mounted.</h3>
	<h3>filesystems or if support for these functions is otherwise.</h3>
	<h3>broken on your system.</h3>
	<p>
		<strong># Defaults.</strong> EnableMMAP On, EnableSendfile Off.
	</p>
	<p>
		#.
	</p>
	<p>
		#EnableMMAP off.
	</p>
	<p>
		#EnableSendfile on.
	</p>
	<h3>Supplemental configuration.</h3>
	<p>
		#.
	</p>
	<h3>The configuration files in the conf/extra/ directory can be.</h3>
	<h3>included to add extra features or to modify the default configuration of.</h3>
	<h3>the server, or you may simply copy their contents here and change as.</h3>
	<h3>necessary.</h3>
	<h3>Server-pool management (MPM specific).</h3>
	<p>
		#Include conf/extra/httpd-mpm.conf.
	</p>
	<h3>Multi-language error messages.</h3>
	<p>
		#Include conf/extra/httpd-multilang-errordoc.conf.
	</p>
	<h3>Fancy directory listings.</h3>
	<p>
		#Include conf/extra/httpd-autoindex.conf.
	</p>
	<h3>Language settings.</h3>
	<p>
		#Include conf/extra/httpd-languages.conf.
	</p>
	<h3>User home directories.</h3>
	<p>
		#Include conf/extra/httpd-userdir.conf.
	</p>
	<h3>Real-time info on requests and configuration.</h3>
	<p>
		#Include conf/extra/httpd-info.conf.
	</p>
	<h3>Virtual hosts.</h3>
	<p>
		#Include conf/extra/httpd-vhosts.conf.
	</p>
	<h3>Local access to the Apache HTTP Server Manual.</h3>
	<p>
		#Include conf/extra/httpd-manual.conf.
	</p>
	<h3>Distributed authoring and versioning (WebDAV).</h3>
	<p>
		#Include conf/extra/httpd-dav.conf.
	</p>
	<h3>Various default settings.</h3>
	<p>
		#Include conf/extra/httpd-default.conf.
	</p>
	<h3>Configure mod_proxy_html to understand HTML4/XHTML1.</h3>
	<pre class='indent-c'><code class='block'>&lt;IfModule proxy_html_module&gt;</code></pre>
	<p>
		Include conf/extra/proxy-html.conf.
	</p>
	<pre class='indent-c'><code class='block'>&lt;/IfModule&gt;</code></pre>
	<h3>Secure (SSL/TLS) connections.</h3>
	<p>
		Include conf/extra/httpd-ssl.conf.
	</p>
	<p>
		#.
	</p>
	<p>
		<strong># Note.</strong> The following must must be present to support.
	</p>
	<h2>#</h2>
	<p>
		Starting without SSL on platforms with no /dev/random equivalent.
	</p>
	<h2>#</h2>
	<p>
		But a statically compiled-in mod_ssl.
	</p>
	<p>
		#.
	</p>
	<pre class='indent-c'><code class='block'>&lt;IfModule ssl_module&gt;</code></pre>
	<p>
		SSLRandomSeed startup builtin.
	</p>
	<p>
		SSLRandomSeed connect builtin.
	</p>
	<pre class='indent-c'><code class='block'>&lt;/IfModule&gt;</code></pre>
	<p>
		PHPIniDir "/Programs/PHP/".
	</p>
	<p>
		LoadFile "/Programs/PHP/php7apache2_4.dll".
	</p>
	<p>
		LoadModule php7_module "/Programs/PHP/php7apache2_4.dll".
	</p>
	<p>
		AddHandler application/x-httpd-php .php.
	</p>
	<p>
		AddType application/x-httpd-php .php.
	</p>
	<pre class='indent-c'><code class='block'>&lt;FilesMatch "\.(html|htm|js|css|json|php)$"&gt;</code></pre>
	<p>
		FileETag None.
	</p>
	<pre class='indent-c'><code class='block'>&lt;IfModule mod_headers.c&gt;</code></pre>
	<p>
		Header unset ETag.
	</p>
	<p>
		Header set Cache-Control "max-age=0, no-cache, no-store, must-revalidate".
	</p>
	<p>
		Header set Pragma "no-cache".
	</p>
	<p>
		Header set Note "CACHING IS DISABLED ON LOCALHOST".
	</p>
	<p>
		Header set Expires "Wed, 11 Jan 1984 05:00:00 GMT".
	</p>
	<pre class='indent-c'><code class='block'>&lt;IfModule &lt;/IfModule&gt;</code></pre>
	<pre class='indent-c'><code class='block'>&lt;/IfModule&gt; &lt;/FilesMatch&gt;</code></pre>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
