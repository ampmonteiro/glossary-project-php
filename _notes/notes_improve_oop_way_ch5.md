# Notes to improve the code oop -> ch5 &#9989;

## in general in all classes files

- all files with .class ext should go into class folder &#9989;

- named of properties and methods should be in camelCase: get_terms -> getTerms, $data_provider -> $dataProvider &#9989;

- apply strict types like is in file_functions (php 7) #9989; &#9989;

- Named arguments ( PHP 8 feature) in all functions e methods

## data file

- data.class.php > Data.php &#9989;

- rename to Model to avoid confusion with $data variable &#9989;

- replace static instead of self &#9989;

##  dataProvider class

- dataprovider.class.php > DataProvider.php &#9989;

- should be an interface  &#9989;

## filedataprovider

- filedataprovider.class.php > FileDataProvider.php &#9989;

- get_terms methods should be centralized into construtor

- apply php 8 feature promoting class properties on source prop #9989;


## glossaryterm

- glossaryterm.class.php > GlossaryTerm.php &#9989;

- defining props with types (in this case all are string type) outside of constructor 

- apply php 8 feature promoting class properties on source prop #9989;

