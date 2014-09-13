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
	const char *limit;
	const char *order;
	const char *group;
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

extern char *cat_sql_where(const char *name,const char *value,char *where);
char *cat_sql_sort(const char *field,const char *sort,char * order);
char *cat_sql_limit(const char *value,char * limit);
char *cat_sql_group(const char *field,const char *having,char * group);
extern int parse_select_sql(st_select_sql *stsql,char *sql);
extern void print_sql_result(MYSQL_RES *res);


