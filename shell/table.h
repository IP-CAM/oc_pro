#ifndef ABOUT_TABLE_H
#define ABOUT_TABLE_H


struct table_cmd {
	char* name;
	int (*fn)(int,const char**);
};

typedef struct table_cmd table_cmd;

int update_category(int,const char**);


table_cmd table_cmd_list[]={
	{"category",update_category}
};

#endif