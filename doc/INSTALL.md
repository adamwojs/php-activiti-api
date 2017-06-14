# Install Apache Tomcat

TODO

# Install Activiti

1. Download activiti-rest
2. Configure database connection in /WEB-INF/classes/db.properties:

```
db=mysql
jdbc.driver=com.mysql.jdbc.Driver
jdbc.url=jdbc:mysql://localhost:3306/activiti
jdbc.username=root
jdbc.password=pass
```

3. Test API

```
curl -X GET http://kermit:kermit@localhost:8080/activiti-rest/service/management/engine
```

Expected response

```
{"name":"default","resourceUrl":null,"exception":null,"version":"6.0.0.3"}
```
