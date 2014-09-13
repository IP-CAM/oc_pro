#include "db.h"

struct st_sql_where{
	const char *name;
	const char *value;
};

typedef struct st_sql_where st_sql_where;

struct st_sql_sort{
	char *name;
	char *value;
};

typedef struct st_sql_sort st_sql_sort;

struct st_select_sql{
	const char *select;
	const char *from;
	const char *where;
	st_sql_sort **sort;
};

typedef struct st_select_sql st_select_sql;

struct st_sql_set{

};

struct st_update_sql{
	char *from;
	char *set;
};

struct st_result{
	char *field;
	char *value;
};

typedef struct st_result st_result;

extern int parse_sql_where(st_sql_where **stwhere,char *where);
extern char *cat_sql_where(const char *name,const char *value,char *where);
extern int parse_select_sql(st_select_sql *stsql,char *sql);
extern void print_sql_result(MYSQL_RES *res);


