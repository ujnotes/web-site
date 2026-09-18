<div id='message'>
	<p>
		This is the default Tomcat home page. It can be found on the local filesystem at: /var/lib/tomcat7/webapps/ROOT/index.html.
	</p>
	<p>
		Tomcat7 veterans might be pleased to learn that this system instance of Tomcat is installed with CATALINA_HOME in /usr/share/tomcat7 and CATALINA_BASE in /var/lib/tomcat7, following the rules from /usr/share/doc/tomcat7-common/RUNNING.txt.gz.
	</p>
	<h2>You might consider installing the following packages, if you haven't already done so</h2>
	<p>
		<strong>tomcat7-docs.</strong> This package installs a web application that allows to browse the Tomcat 7 documentation locally. Once installed, you can access it by clicking here.
	</p>
	<p>
		<strong>tomcat7-examples.</strong> This package installs a web application that allows to access the Tomcat 7 Servlet and JSP examples. Once installed, you can access it by clicking here.
	</p>
	<p>
		<strong>tomcat7-admin.</strong> This package installs two web applications that can help managing this Tomcat instance. Once installed, you can access the manager webapp and the host-manager webapp.
	</p>
	<p>
		<strong>NOTE.</strong> For security reasons, using the manager webapp is restricted to users with role "manager-gui". The host-manager webapp is restricted to users with role "admin-gui". Users are defined in /etc/tomcat7/tomcat-users.xml.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
