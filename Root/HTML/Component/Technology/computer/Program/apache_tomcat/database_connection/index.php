<div id='message'>
	<h2>Class.forName("com.microsoft.sqlserver.jdbc.SQLServerDriver");</h2>
	<p>
		Connection con = DriverManager.getConnection("jdbc:sqlserver://localhost:1433;databaseName=NitgenAccessManager;user=Perm;password=^&amp;8&amp;^%8*Pe$!");.
	</p>
	<p>
		Statement statement = con.createStatement() ;.
	</p>
	<p>
		ResultSet resultset = statement.executeQuery("select Top 10 * from NGAC_AUTHLOG") ;.
	</p>
	<p>
		Resultset.next();.
	</p>
	<p>
		________________.
	</p>
	<p>
		PostgreSQL.
	</p>
	<p>
		Try {.
	</p>
	<p>
		String driver = "org.postgresql.Driver";.
	</p>
	<p>
		String url = "jdbc:postgresql://localhost:5432/cpanelusername_dbname";.
	</p>
	<pre class='indent-c'><code class='block'>String username = "&lt;Username&gt;";</code></pre>
	<pre class='indent-c'><code class='block'>String String password = "&lt;Password&gt;";</code></pre>
	<p>
		String myDataField = null;.
	</p>
	<p>
		String myQuery = "SELECT * FROM sample LIMIT 1";.
	</p>
	<p>
		Connection myConnection = null;.
	</p>
	<p>
		PreparedStatement myPreparedStatement = null;.
	</p>
	<p>
		ResultSet myResultSet = null;.
	</p>
	<p>
		Class.forName(driver).newInstance();.
	</p>
	<p>
		MyConnection = DriverManager.getConnection(url,username,password);.
	</p>
	<p>
		MyPreparedStatement = myConnection.prepareStatement(myQuery);.
	</p>
	<p>
		MyResultSet = myPreparedStatement.executeQuery();.
	</p>
	<p>
		If(myResultSet.next()).
	</p>
	<p>
		MyDataField = myResultSet.getString("dispname");.
	</p>
	<p>
		Out.print(myDataField);.
	</p>
	<p>
		}.
	</p>
	<p>
		Catch(ClassNotFoundException e){e.printStackTrace();}.
	</p>
	<p>
		Catch (SQLException ex).
	</p>
	<p>
		{.
	</p>
	<p>
		<strong>out.print("SQLException.</strong> "+ex.getMessage());.
	</p>
	<p>
		<strong>out.print("SQLState.</strong> " + ex.getSQLState());.
	</p>
	<p>
		<strong>out.print("VendorError.</strong> " + ex.getErrorCode());.
	</p>
	<p>
		}.
	</p>
</div>

<?php require('../HTML/Fragment/Component_bottom.php') ?>
