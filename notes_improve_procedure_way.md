# Notes to improve the code  &#9989;

## In functions:
- all fn should be using **strong type** and **stricly mode**, PHP 7. &#9989;

- all fn should be using **strong type** and **stricly mode**, PHP 7.0 &#9989;

- fn **redirect** use exit instead of die, since do not pass a value &#9989;

- fn **view** avoid use global, so the view_bag should pass as param, instead of calling as model change to data &#9989;

- fn **sanitize**, for now only is applied to string, make others branches to be apply to numbers or html 

## In data > file_functions 


- fn **get_data**, change name of variable json to data because only return string

- fn **get_terms**, create a params that give a possibility when decode the data, do it as assoc array

- using **array assoc** instead of obj when decode data, update the fn for data

- fn **get_terms**, it is called in all fn, try to centralizing in variable, maybe calling only is calling the controller ???

- fn **get_term**, maybe use / create a fn to find the index, case >= 0, return the assoc / obj.

- fn, **update_term**, the same as, use a fn to fund the index and make a update with it.

- fn **get_term** and  **update_term**, instead of $original_term, it would be pass the index in array (simmiliar to in DB you use id / an unique identifier)

- fn **delete_term**, the same as previous, only is passed as param the index instead of term

- fn **set_data** and  **get_data**, should be pass the name of the file as param 

- fn **delete_term**, not use **unset** fn

- fn **search_term**, try **using str_contains** fn, available in PHP 8.0


## others improvements

- in **all app** and **forms**, create a better UI (with boostrap 5) &#9989;

- all pages (where is business logic) should use clean url
 
- in **login**, password should not be sanitize

- the **logout**, should be inside of admin

- in **admin/index**, should be using a spcific layout, where shows email and btn logout

- in **main layout**, should show login link

- **app** folder, should be called core or something

- **admin** folder, should be called backoffice, which is the correct name.