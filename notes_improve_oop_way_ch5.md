# Notes to improve the code oop -> ch5 &#9989;

## in general in all classes files

- all files with .class ext should go into class folder &#9989;

- named of properties and methods should be in camelCase: get_terms -> getTerms, $data_provider -> $dataProvider

## data file

- data.class.php > Data.php &#9989;

- rename to Model to avoid confusion with $data variable

- replace static instead of self

##  dataProvider class

- dataprovider.class.php < DataProvider.php &#9989;


- should be an interface 

## filedataprovider

- filedataprovider.class.php > FileDataProvider.php &#9989;

- get_terms methods should be centralized into construtor

- apply php 8 feature promoting class properties on source prop


## glossaryterm

- glossaryterm.class.php > GlossaryTerm.php &#9989;

- defining props with types (in this case all are string type) outside of constructor 

- apply php 8 feature promoting class properties on source prop

