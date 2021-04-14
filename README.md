# MovieAPI

## Create Data source (Mysql)

- CREATE DATABASE api_db CHARACTER SET utf8mb4;
- mysql -u username -p api_db < ./sqlfile/api_db.sql


## MAMP (mac)
- install MAMP and start
- Document root set to MovieAPI

## Following endpoints and url

| Method | url | beurl | Description | 
| --- | --- | --- | --- |
| GET | /movies | /movies.php/| getting list of movies |
| GET | /movies/:id | /detail.php?id= | detail for specific movie
| GET | /movies?search={search} | /movies.php?search=/| get moview what user search for by name |
| GET | /favorites | /favorites.php | getting list of favorite movies |
| POST | /favorite/:id | /favorite.php?id= | add favorite movie by id |


