# projet-web-2A

trick to enable relation between sql tables in mysql:

```sql
SELECT CONCAT('ALTER TABLE ', table_name, ' ENGINE=InnoDB;') 
FROM information_schema.tables 
WHERE table_schema = '5ademni' AND engine = 'MyISAM';
```
