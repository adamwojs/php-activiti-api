# Install Apache Tomcat

1. Download Apache Tomcat 9 from http://tomcat.apache.org/download-90.cgi
2. Unzip downloaded archive
3. Run server by executing following command in Tomcat installation directory (`$CATALINA_HOME`):

```
bin/catalina.sh start
```

4. In browser open http://localhost:8080/, you should see Tomcat server's welcome page.

# Install Activiti

1. Download Activiti 6 from https://www.activiti.org/download-bpm
2. Unzip downloaded archive
3. Deploy `activiti-rest` by copy `/war/activiti-rest.war` files into
   `$CATALINA_HOME/webapps` directory.
4. Open in browser http://kermit:kermit@localhost:8080/activiti-rest/service/management/engine.
   Expected response is the following JSON:

```
{"name":"default","resourceUrl":null,"exception":null,"version":"6.0.0.3"}
```

# Configure Activiti to use MySQL

1. Download MySQL connector for JDBC from https://dev.mysql.com/downloads/connector/j/
2. Copy downloaded jar file into `$CATALINA_HOME/lib`
3. Edit following connection properties in `/WEB-INF/classes/db.properties`

```
db=mysql
jdbc.driver=com.mysql.jdbc.Driver
jdbc.url=jdbc:mysql://localhost:3306/activiti
jdbc.username=root
jdbc.password=pass
```

4. Restart Tomcat
