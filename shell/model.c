#include <string.h>
#include "common.h"
#include "model.h"
#include "dict.h"

char *cat_sql_where(const char *name,const char *value,char *where){
	char tmp[128];
	sprintf(tmp," %s = '%s'",name,value);
	if(strlen(where)) strcat(where," AND ");
	if(strlen(where)==0) strcat(where," WHERE ");
	return strcat(where,tmp);
}

char *cat_sql_sort(const char *field,const char *sort,char * order){
	char tmp[128];
	sprintf(tmp,"%s %s",field,sort);
	if(strlen(order)) strcat(order,",");
	if(strlen(order)==0) strcat(order," ORDER BY ");
	return strcat(order,tmp);
}

char *cat_sql_group(const char *field,const char *having,char * group){
	sprintf(group," GROUP BY %s ",field);
	return group;
}

char *cat_sql_limit(const char *value,char * limit){
	sprintf(limit," LIMIT %s",value);
	return limit;
}

int parse_select_sql(st_select_sql *stsql,char *sql){
	sprintf(sql,"SELECT %s FROM %s%s%s%s%s%s",stsql->select,DBPRE,stsql->from,stsql->where,stsql->group,stsql->order,stsql->limit);
	printf("%s\n", sql);
	return 0;
}

void print_sql_result(MYSQL_RES *res){
	unsigned int field_count=res->field_count;
	my_ulonglong row_count=res->row_count;
	char *columns[row_count+4][field_count];
	int maxlen[field_count];
	for (int i = 0; i < field_count; ++i){
		maxlen[i]=strlen(res->fields[i].name);
		columns[1][i]=res->fields[i].name;
	}
	int j=3;
	MYSQL_ROWS *row=res->data_cursor;
	do{
		for (int i = 0; i < field_count; ++i){
			if(maxlen[i]<strlen(row->data[i])) maxlen[i]=strlen(row->data[i]);
			columns[j][i]=row->data[i];
		}
		j++;
	}while((row=row->next)!=NULL);

	for (int i = 0; i < row_count+4; ++i){
		for (int f = 0; f < field_count; ++f){
			if(i==0 || i==2 || i==row_count+3){
				char *top=(char*)malloc(sizeof(char)*maxlen[f]);
				strpad(top,maxlen[f],"-");
				printf("+ %s ", top);
			}else{
				char * tmpvalue=(char*)malloc(sizeof(char)*maxlen[f]);
				strcat(tmpvalue,columns[i][f]);
				strpad(tmpvalue,maxlen[f]," ");
				printf("| %s ", tmpvalue);
			}
		}
		if(i==0 || i==2 || i==row_count+3)
			printf("%s\n", "+");
		else
			printf("%s\n", "|");
	}
}