Command to list all tables in a database to convert them to InnoDB

```sql
SELECT CONCAT('ALTER TABLE ', table_name, ' ENGINE=InnoDB;') 
FROM information_schema.tables 
WHERE table_schema = '5ademni' AND engine = 'MyISAM';
```

Command to list all tables in a database to drop them
```sql
SELECT CONCAT('DROP TABLE ', table_name, ';') 
FROM information_schema.tables 
WHERE table_schema = '5ademni';
```
