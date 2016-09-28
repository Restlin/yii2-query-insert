# yii2-query-insert
Class for Yii2 PHP framework helps to generate insert sql query from other tables.

This class helps to create query as below:

```sql

insert into rights_cache(id,login,type,date_in)
select id,login,type,now()
from rights 
where date_in>date_trunc('day',now());
```
