# Notes of improving ch6 &#9989;

- rename mysqldataprovider.class to MySQLDataProvider.php &#9989;

. move mysqldataprovider / MySQLDataProvider.php to classes folder &#9989;

- in mysqldataprovider / MySQLDataProvider.php change:

    1. connect method should be call only once and in construct

    2. remove the call of connect method in  query and execute

    3. create a property that receive the instance of PDO from connect method

    4. getTerm change fetchAll to fetch, since you want only one row



