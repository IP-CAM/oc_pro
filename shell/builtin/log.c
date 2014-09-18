#include "log.h"
#include "model.h"
#include "time.h"

int file_exist(char* filename){
	FILE *fp=fopen(filename,"r");
	if(fp){
		fclose(fp);
		return 1;
	}
	return 0;
}

st_sql_log *get_date_log(char *dt){
	char f[100];
	sprintf(f,"%s%s%s",LOG_PATH,dt,LOG_EXT);
	if(!file_exist(f)){
		return NULL;
	}
	FILE *fp=fopen(f,"r");
	int ch;
	int rows=0;
	while((ch=fgetc(fp))!= EOF){
		if(ch==10){ // \n
			rows++;
		}
	}
	if(rows==0) return NULL;
	st_sql_log *logs=(st_sql_log*)calloc(sizeof(st_sql_log),rows);
	char *sqltime=(char*)malloc(sizeof(char)*30);
	char *sql=(char*)malloc(sizeof(char)*1024);
	int flag=0;
	rewind(fp);
	int row=0;
	while((ch=fgetc(fp))!=EOF){
		if(ch==9){ // \t
			row++;
			printf("%s\n", "sqltime");
			printf("%s\n", sqltime);
			continue;
		}
		*sqltime=ch;
		sqltime++;
	}
	return NULL;
}

void sqllog(char *type,char *sql){
	char filepath[128]="";
	time_t now=time(NULL);
	struct tm *tmptr=gmtime(&now);
	int month=tmptr->tm_mon;
	sprintf(filepath,"%s%d%d%d%s",LOG_PATH,tmptr->tm_year+1900,tmptr->tm_mon+1,tmptr->tm_mday,LOG_EXT);
	char logstr[1024];
	sprintf(logstr,"%d-%d-%d %d:%d:%d\t%s",tmptr->tm_year+1900,tmptr->tm_mon+1,tmptr->tm_mday,tmptr->tm_hour,tmptr->tm_min,tmptr->tm_sec,sql);
	FILE *fp=fopen(filepath,"a+");
	fprintf(fp, "%s\n", logstr);
}

static char *get_file_name(char *filepath){
	time_t now=time(NULL);
	struct tm *tmptr=gmtime(&now);
	int month=tmptr->tm_mon;
	sprintf(filepath,"%s%d%d%d%s",LOG_PATH,tmptr->tm_year+1900,tmptr->tm_mon+1,tmptr->tm_mday,LOG_EXT);
	return filepath;
}

static char *get_current_date(){
	time_t now=time(NULL);
	struct tm *tmptr=gmtime(&now);
	char *current=malloc(sizeof(char)*9);
	sprintf(current,"%d%d%d",tmptr->tm_year+1900,tmptr->tm_mon+1,tmptr->tm_mday);
	return current;
}

static int check_cmd_args(int argc,const char **argv){
	return 1;
}

int cmd_log(int argc,const char** argv){
	// check necessary param
	check_cmd_args(argc,argv);

	char *current="";

	while(*argv){
		if(!strcmp("-t",*argv)){
			argv++;
			current=(char*)*argv;
			argv++;
		}else{
			argv++;
		}
	}

	if(!strlen(current)) current=get_current_date();

	get_date_log(current);

	return 1;
}