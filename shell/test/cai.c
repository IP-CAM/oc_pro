#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>

#define count(x) (sizeof(x)/sizeof(x[0]))

int in_array(int v,int *array,int count){
	for (int i = 0; i < count; ++i)
	{
		if(array[i]==v) return 1;
	}
	return 0;
}

int array_push(int v,int *array,int count){
	for (int i = 0; i < count; ++i)
	{
		if(array[i]==0){
			array[i]=v;
			return v;
		}
	}
	return 0;
}

int array_compare(int *array1,int *array2){
	unsigned int len1=count(array1),len2=count(array2);
	if(len2!=len1) return -1;
	for (int i = 0; i < len1; ++i)
	{
		if(array1[i]!=array2[i]) return -1;
	}
	return 0;
}

struct lottery{
	int blue[6];
	int red;
};

typedef struct lottery lottery;

// int blue[]={1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33};

// int red[]={1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16};

static lottery wins[1]={
	{{1,3,14,19,22,32},12}
};

int blue[6]={0};
int red=0;

int main(int argc,char** argv){
	int count=count(blue);
	int total=count(wins);
	over_again:
	for (int j = 0; j < total; ++j)
	{
		for (int i = 0; i < 6; ++i)
		{
			srand(time(NULL)+i+j);
			int b=1+rand()%33;
			if(wins[j].blue[i]!=b){
				goto over_again;
			}
			if(in_array(b,blue,count)){
				i--;
				continue;
			}
			puts()
			array_push(b,blue,count);
		}
		red=1+rand()%16;
		if(wins[j].red!=red){
			goto over_again;
		}
	}
	printf("%d\n", 33333);

	// lottery win={.blue=&sb,.red=sr};
	// printf("%d\n", win.red);

}