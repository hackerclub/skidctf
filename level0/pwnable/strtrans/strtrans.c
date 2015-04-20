#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <string.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>

void grant_admin_access()
{
  int fd;
  char flagbuf[100];

  printf("Welcome Admin!\n");
  fd = open("flag", O_RDONLY);
  if (fd < 0)
  {
    perror("open");
  }
  
  memset(flagbuf, 0, sizeof(flagbuf));
  read(fd, flagbuf, sizeof(flagbuf));
  printf("%s\n", flagbuf);
}

int main(void)
{
  char str[30];
  int not_admin = 1;

  /* turn off buffering */
  setvbuf(stdin, NULL, _IONBF, 0);
  setvbuf(stdout, NULL, _IONBF, 0);

  printf("Give me a string! I will transform it!\n");

  gets(str);

  if (!not_admin)
  {
    grant_admin_access();
    exit(0);
  }

  printf("Behold:\n");
  strfry(str);
  printf("%s\n", str);
  exit(0);
}
