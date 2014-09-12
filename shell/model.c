#include <string.h>
#include "common.h"
#include "model.h"


int parse_sql_where(st_sql_where **stwhere,char *where){
	while(*stwhere){
		printf("%s\n", (*stwhere)->name);
		sprintf(where," AND %s = '%s'",(*stwhere)->name,(*stwhere)->value);
		stwhere++;
	}
	printf("%s\n", where);
	return 0;
}

char *cat_sql_where(const char *name,const char *value,char *where){
	char tmp[125];
	sprintf(tmp," AND %s = '%s'",name,value);
	return strcat(where,tmp);
}

int parse_select_sql(st_select_sql *stsql,char *sql){
	sprintf(sql,"SELECT %s FROM %s%s WHERE 1 %s",stsql->select,DBPRE,stsql->from,stsql->where);
	return 0;
}