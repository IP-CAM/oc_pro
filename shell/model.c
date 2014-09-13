#include <string.h>
#include "common.h"
#include "model.h"
#include "dict.h"


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

void print_sql_result(MYSQL_RES *res){
	unsigned int field_count=res->field_count;
	my_ulonglong row_count=res->row_count;
	char *columns[row_count+5][field_count];
	int maxlen[row_count];
	for (int i = 0; i < field_count; ++i)
	{
		columns[0][i]="+++++++++";
		columns[2][i]="+++++++++";
		columns[3][i]="+++++++++";
	}
	for (int i = 0; i < field_count; ++i){
		maxlen[i]=strlen(res->fields[i].name);
		columns[1][i]=res->fields[i].name;
	}
	int j=4;
	MYSQL_ROWS *row=res->data_cursor;
	do{
		for (int i = 0; i < field_count; ++i){
			if(maxlen[i]<strlen(row->data[i])) maxlen[i]=strlen(row->data[i]);
			columns[j][i]=row->data[i];
		}
		j++;
	}while((row=row->next)!=NULL);
	// printf("%s\n", "columns");
	for (int i = 0; i < row_count+5; ++i){
		char *longstr={"|"};
		for (int f = 0; f < field_count; ++f){
			printf("| %s ", columns[i][f]);
		}
		
		// printf("%s\n", columns[i][1]);
		printf("%s\n", longstr);
	}
}