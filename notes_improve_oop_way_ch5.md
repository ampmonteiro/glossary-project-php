# Notes to improve the code oop -> ch5

## in general in all classes files

- all files with .class ext should go into class folder

- named of properties and methods should be in camelCase: get_terms -> getTerms, $data_provider -> $dataProvider

## data file

- data.class.php > Data.php

- replace static instead of self

##  dataProvider class

- dataprovider.class.php < DataProvider.php

- should be an interface 

- apply php 8 feature promoting class properties on source prop

## filedataprovider

- filedataprovider.class.php > FileDataProvider.php

- get_terms methods should be centralized into construtor


## glossaryterm

- glossaryterm.class.php > GlossaryTerm.php

- apply php 8 feature promoting class properties on source prop

