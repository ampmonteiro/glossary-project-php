# Notes of improving ch6 &#9989;

- rename mysqldataprovider.class to MySQLDataProvider.php &#9989;

. move mysqldataprovider / MySQLDataProvider.php to classes folder &#9989;

- in mysqldataprovider / MySQLDataProvider.php change:

    1. connect method should be call only once and in construct &#9989;

    2. remove the call of connect method in  query and execute &#9989;

    3. create a property that receive the instance of PDO from connect method &#9989;

    4. getTerm change fetchAll to fetch, since you want only one row &#9989;

- organize better the App folder, i.e:
    -> create _src folder &#9989;
    -> create folders classes, functions, data and interfaces &#9989;
    -> move views folder into _src folder &#9989;



