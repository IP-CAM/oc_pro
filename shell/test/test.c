#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <mysql.h>


struct category_struct{
	int category_id;
	char *name;
	int id_parent;
};

struct st_order_status{
	int order_status_id;
	char *name;
};

typedef struct category_struct category_struct;
typedef struct st_order_status st_order_status;

#define ARRAY_SIZE(x) (sizeof(x)/sizeof(x[0]))

category_struct categories[]={
	{1,"home",1},
	{2,"man",1},
	{3,"women",1}
};

void updateCategory(category_struct category){
	categories[2]=category;
}

int query(char *sql,st_order_status *rows){
	MYSQL mysql;
	MYSQL_RES *result;
	MYSQL_ROW row;
	mysql_init(&mysql);
	mysql_real_connect(&mysql,"127.0.0.1","team","team","test",0,NULL,0);
	mysql_query(&mysql,sql);
	result=mysql_store_result(&mysql);
	int count=mysql_num_rows(result);
	st_order_status *rows=(st_order_status*)calloc(sizeof(st_order_status),count);
	while((row=mysql_fetch_row(result))!=NULL){
		st_order_status r={.order_status_id=atoi(row[0]),.name=row[1]};
		rows[--count]=r;
	}
	// free(rows);
	return rows;
}

int main(int argc,char** argv){
	while(*argv){
		printf("%s\n", *argv);
		while(**argv){
			printf("%c\n", **argv);
			(*argv)++;
		}
		argv++;
	}

	category_struct category={3,"veteric",1};

	updateCategory(category);

	for (int i = 0; i < ARRAY_SIZE(categories); ++i)
	{
		printf("%s\n", (categories+i)->name);
	}
	st_order_status *rows=query("select order_status_id,name from oc_order_status");
	printf("%lu\n", ARRAY_SIZE(rows));
	// while(*rows){
		// printf("%s\n", rows[0].name);
		// rows++;
	// }
}
