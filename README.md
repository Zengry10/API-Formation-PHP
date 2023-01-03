
# API PHP Formation

Here is an API on the topic of training. 
### Below you will find the different routes to test the API

After having git clone the project, you will be able to use a software like PostMan by informing in the url the path of the project. For example :

```http
  GET https://localhost/API/Formation/
```

- To see all the trainings : 

```http
  GET https://localhost/API/Formation/read.php
```

- To see a specific training : 

```http
  GET https://localhost/API/Formation/single_read.php
```

- to update a training : 

```http
  PUT https://localhost/API/Formation/single_read.php
```

- Pour supprimer une formation

```http
  DELETE https://localhost/API/Formation/single_read.php
```