-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2017 at 12:07 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlinejudge`
--

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE IF NOT EXISTS `code` (
  `problemId` int(11) NOT NULL,
  `submission_id` int(11) NOT NULL,
  `ProblemName` varchar(100) NOT NULL,
  `language` varchar(10) NOT NULL,
  `submission_time` varchar(30) NOT NULL,
  `verdict` varchar(20) NOT NULL,
  `U_name` varchar(50) NOT NULL,
  `Source` mediumtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1061 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`problemId`, `submission_id`, `ProblemName`, `language`, `submission_time`, `verdict`, `U_name`, `Source`) VALUES
(1001, 1047, 'Simple Sum', 'C++', '2017-01-02 22:07:02', 'Accepted', 'bi11a1', '#include<bits/stdc++.h>\r\nusing namespace std;\r\nint main(){\r\n	freopen("input.txt", "r", stdin);\r\n	freopen("output.txt", "w", stdout);\r\n	int a, b;\r\n	while(cin >> a >> b){\r\n		//for(long long i=0; i<10000; ++i);\r\n		cout << a << " + " << b << " = " << a+b << endl;\r\n	}\r\n	return 0;\r\n}'),
(1001, 1048, 'Simple Sum', 'C++', '2017-01-02 22:09:37', 'Accepted', 'bi11a1', '#include<bits/stdc++.h>\r\nusing namespace std;\r\nint main(){\r\n	freopen("input.txt", "r", stdin);\r\n	freopen("output.txt", "w", stdout);\r\n	int a, b;\r\n	while(cin >> a >> b){\r\n		//for(long long i=0; i<1000000000000000; ++i);\r\n		cout << a << " + " << b << " = " << a+b << endl;\r\n	}\r\n	return 0;\r\n}'),
(1004, 1049, 'Brush', 'C++', '2017-01-03 02:26:51', 'Accepted', 'bi11a1', '#include<bits/stdc++.h>\r\nusing namespace std;\r\nint main(){\r\n     freopen("input.txt", "r", stdin);\r\n     freopen("output.txt", "w", stdout);\r\n    int t, T;\r\n    int n, k, sm;\r\n    scanf("%d", &T);\r\n    for(t=1; t<=T; ++t){\r\n        scanf("%d", &n);\r\n        sm=0;\r\n        while(n--){\r\n            scanf("%d", &k);\r\n            if(k>0) sm+=k;\r\n        }\r\n        printf("Case %d: %d\\n", t, sm);\r\n    }\r\n    return 0;\r\n}'),
(1004, 1050, 'Brush', 'C++', '2017-01-03 02:28:05', 'Wrong Answer', 'bi11a1', '#include<bits/stdc++.h>\r\nusing namespace std;\r\nint main(){\r\n     freopen("input.txt", "r", stdin);\r\n     freopen("output.txt", "w", stdout);\r\n    int t, T;\r\n    int n, k, sm;\r\n    scanf("%d", &T);\r\n    for(t=1; t<=T; ++t){\r\n        scanf("%d", &n);\r\n        sm=0;\r\n        while(n--){\r\n            scanf("%d", &k);\r\n            if(k>0) sm-=k;\r\n        }\r\n        printf("Case %d: %d\\n", t, sm);\r\n    }\r\n    return 0;\r\n}'),
(1004, 1051, 'Brush', 'C++', '2017-01-03 02:28:49', 'Compilation Error', 'bi11a1', '#include<bits/stdc++.h>\r\nusing namespace std;\r\nint main(){\r\n     freopen("input.txt", "r", stdin);\r\n     freopen("output.txt", "w", stdout);\r\n    int t, T;\r\n    int n, k, sm;\r\n    scanf("%d", &T);\r\n    for(t=1; t<=T; ++t){\r\n        scanf("%d", &n);\r\n        sm=0;\r\n        while(n--){\r\n            scanf("%d", &k);\r\n            if(k>0) sm+=k;\r\n        }\r\n        printf("Case %d: %d\\n", t, sm)\r\n    }\r\n    return 0;\r\n}'),
(1006, 1052, 'Intelligent Factorial Factorization', 'C++', '2017-01-03 04:18:48', 'Accepted', 'bi11a1', '#include<iostream>\r\n#include<cmath>\r\n#include<cstring>\r\n#include<stdio.h>\r\nusing namespace std;\r\n\r\nlong int ara[1000010];\r\nvoid sieve(long int n){\r\n     int i, j;\r\n     for(i=0; i<=n; i++){\r\n          ara[i]=0;\r\n     }\r\n     int sq;\r\n     sq=sqrt(n);\r\n     ara[0]=1;\r\n     ara[1]=1;\r\n     for(i=4; i<=n; i+=2){\r\n          ara[i]=1;\r\n     }\r\n     for(i=3; i<=sq; i+=2){\r\n          if(ara[i]==0){\r\n               for(j=i*i; j<=n; j+=2*i) ara[j]=1;\r\n          }\r\n     }\r\n}\r\n\r\nint main(){\r\n     freopen("input.txt", "r", stdin);\r\n     freopen("output.txt", "w", stdout);\r\n     sieve(200);\r\n     int a, b, c, x, tc, t, n;\r\n     int prime[200];\r\n     int cnt[200];\r\n\r\n     x=0;\r\n     for(a=0; a<105; a++){\r\n          if(ara[a]==0){\r\n               prime[x++]=a;\r\n          }\r\n     }\r\n     cin >> tc;\r\n     for(t=1; t<=tc; t++){\r\n          scanf("%d", &n);\r\n          memset(cnt, 0, sizeof(cnt));\r\n          for(a=2; a<=n; a++){\r\n               if(ara[a]==0){\r\n                    cnt[a]++;\r\n               }\r\n               else{\r\n                    c=a;\r\n                    for(b=0; b<x && c>1; b++){\r\n                         if(c%prime[b]==0){\r\n                              cnt[prime[b]]++;\r\n                              c=c/prime[b];\r\n                              b--;\r\n                         }\r\n                    }\r\n               }\r\n          }\r\n          printf("Case %d: %d = ", t, n);\r\n          int cn;\r\n          cn=0;\r\n          for(a=0; a<200; a++){\r\n               if(cnt[a]!=0) cn++;\r\n          }\r\n          for(a=0, b=0; a<200; a++){\r\n               if(cnt[a]!=0){\r\n                    if(b<cn-1){\r\n                         printf("%d (%d) * ", a, cnt[a]);\r\n                    }\r\n                    else printf("%d (%d)\\n", a, cnt[a]);\r\n                    b++;\r\n               }\r\n          }\r\n     }\r\n     return 0;\r\n}\r\n'),
(1008, 1053, 'Back to Underworld', 'C++', '2017-01-03 04:22:09', 'Compilation Error', 'bi11a1', '#include<iostream>\r\n#include<cmath>\r\n#include<cstring>\r\n#include<stdio.h>\r\nusing namespace std;\r\n\r\nlong int ara[1000010];\r\nvoid sieve(long int n){\r\n     int i, j;\r\n     for(i=0; i<=n; i++){\r\n          ara[i]=0;\r\n     }\r\n     int sq;\r\n     sq=sqrt(n);\r\n     ara[0]=1;\r\n     ara[1]=1;\r\n     for(i=4; i<=n; i+=2){\r\n          ara[i]=1;\r\n     }\r\n     for(i=3; i<=sq; i+=2){\r\n          if(ara[i]==0){\r\n               for(j=i*i; j<=n; j+=2*i) ara[j]=1;\r\n          }\r\n     }\r\n}\r\n\r\nint main(){\r\n     freopen("input.txt", "r", stdin);\r\n     freopen("output.txt", "w", stdout);\r\n     sieve(200);\r\n     int a, b, c, x, tc, t, n;\r\n     int prime[200];\r\n     int cnt[200];\r\n\r\n     x=0;\r\n     for(a=0; a<105; a++){\r\n          if(ara[a]==0){\r\n               prime[x++]=a;\r\n          }\r\n     }\r\n     cin >> tc;\r\n     for(t=1; t<=tc; t++){\r\n          scanf("%d", &n);\r\n          memset(cnt, 0, sizeof(cnt));\r\n          for(a=2; a<=n; a++){\r\n               if(ara[a]==0){\r\n                    cnt[a]++;\r\n               }\r\n               else{\r\n                    c=a;\r\n                    for(b=0; b<x && c>1; b++){\r\n                         if(c%prime[b]==0){\r\n                              cnt[prime[b]]++;\r\n                              c=c/prime[b];\r\n                              b--;\r\n                         }\r\n                    }\r\n               }\r\n          }\r\n          printf("Case %d: %d = ", t, n);\r\n          int cn;\r\n          cn=0;\r\n          for(a=0; a<200; a++){\r\n               if(cnt[a]!=0) cn++;\r\n          }\r\n          for(a=0, b=0; a<200; a++){\r\n               if(cnt[a]!=0){\r\n                    if(b<cn-1){\r\n                         printf("%d (%d) * ", a, cnt[a])\r\n                    }\r\n                    else printf("%d (%d)\\n", a, cnt[a]);\r\n                    b++;\r\n               }\r\n          }\r\n     }\r\n     return 0;\r\n}\r\n'),
(1008, 1054, 'Back to Underworld', 'C++', '2017-01-03 04:22:32', 'Wrong Answer', 'bi11a1', '#include<iostream>\r\n#include<cmath>\r\n#include<cstring>\r\n#include<stdio.h>\r\nusing namespace std;\r\n\r\nlong int ara[1000010];\r\nvoid sieve(long int n){\r\n     int i, j;\r\n     for(i=0; i<=n; i++){\r\n          ara[i]=0;\r\n     }\r\n     int sq;\r\n     sq=sqrt(n);\r\n     ara[0]=1;\r\n     ara[1]=1;\r\n     for(i=4; i<=n; i+=2){\r\n          ara[i]=1;\r\n     }\r\n     for(i=3; i<=sq; i+=2){\r\n          if(ara[i]==0){\r\n               for(j=i*i; j<=n; j+=2*i) ara[j]=1;\r\n          }\r\n     }\r\n}\r\n\r\nint main(){\r\n     freopen("input.txt", "r", stdin);\r\n     freopen("output.txt", "w", stdout);\r\n     sieve(200);\r\n     int a, b, c, x, tc, t, n;\r\n     int prime[200];\r\n     int cnt[200];\r\n\r\n     x=0;\r\n     for(a=0; a<105; a++){\r\n          if(ara[a]==0){\r\n               prime[x++]=a;\r\n          }\r\n     }\r\n     cin >> tc;\r\n     for(t=1; t<=tc; t++){\r\n          scanf("%d", &n);\r\n          memset(cnt, 0, sizeof(cnt));\r\n          for(a=2; a<=n; a++){\r\n               if(ara[a]==0){\r\n                    cnt[a]++;\r\n               }\r\n               else{\r\n                    c=a;\r\n                    for(b=0; b<x && c>1; b++){\r\n                         if(c%prime[b]==0){\r\n                              cnt[prime[b]]++;\r\n                              c=c/prime[b];\r\n                              b--;\r\n                         }\r\n                    }\r\n               }\r\n          }\r\n          printf("Case %d: %d = ", t, n);\r\n          int cn;\r\n          cn=0;\r\n          for(a=0; a<200; a++){\r\n               if(cnt[a]!=0) cn++;\r\n          }\r\n          for(a=0, b=0; a<200; a++){\r\n               if(cnt[a]!=0){\r\n                    if(b<cn-1){\r\n                         printf("%d (%d) * ", a, cnt[a]);\r\n                    }\r\n                    else printf("%d (%d)\\n", a, cnt[a]);\r\n                    b++;\r\n               }\r\n          }\r\n     }\r\n     return 0;\r\n}\r\n'),
(1001, 1055, 'Simple Sum', 'C++', '2017-01-03 04:29:06', 'Accepted', 'sabiha', '#include<bits/stdc++.h>\r\nusing namespace std;\r\nint main(){\r\n	freopen("input.txt", "r", stdin);\r\n	freopen("output.txt", "w", stdout);\r\n	int a, b;\r\n	while(cin >> a >> b){\r\n		//for(long long i=0; i<1000000000000000; ++i);\r\n		cout << a << " + " << b << " = " << a+b << endl;\r\n	}\r\n	return 0;\r\n}'),
(1003, 1056, 'nth Term', 'C++', '2017-01-03 04:29:52', 'Wrong Answer', 'sabiha', '#include<bits/stdc++.h>\r\nusing namespace std;\r\nint main(){\r\n	freopen("input.txt", "r", stdin);\r\n	freopen("output.txt", "w", stdout);\r\n	int a, b;\r\n	while(cin >> a >> b){\r\n		//for(long long i=0; i<1000000000000000; ++i);\r\n		cout << a << " + " << b << " = " << a+b << endl;\r\n	}\r\n	return 0;\r\n}'),
(1006, 1057, 'Intelligent Factorial Factorization', 'C++', '2017-01-03 04:30:29', 'Accepted', 'sabiha', '#include<iostream>\r\n#include<cmath>\r\n#include<cstring>\r\n#include<stdio.h>\r\nusing namespace std;\r\n\r\nlong int ara[1000010];\r\nvoid sieve(long int n){\r\n     int i, j;\r\n     for(i=0; i<=n; i++){\r\n          ara[i]=0;\r\n     }\r\n     int sq;\r\n     sq=sqrt(n);\r\n     ara[0]=1;\r\n     ara[1]=1;\r\n     for(i=4; i<=n; i+=2){\r\n          ara[i]=1;\r\n     }\r\n     for(i=3; i<=sq; i+=2){\r\n          if(ara[i]==0){\r\n               for(j=i*i; j<=n; j+=2*i) ara[j]=1;\r\n          }\r\n     }\r\n}\r\n\r\nint main(){\r\n     freopen("input.txt", "r", stdin);\r\n     freopen("output.txt", "w", stdout);\r\n     sieve(200);\r\n     int a, b, c, x, tc, t, n;\r\n     int prime[200];\r\n     int cnt[200];\r\n\r\n     x=0;\r\n     for(a=0; a<105; a++){\r\n          if(ara[a]==0){\r\n               prime[x++]=a;\r\n          }\r\n     }\r\n     cin >> tc;\r\n     for(t=1; t<=tc; t++){\r\n          scanf("%d", &n);\r\n          memset(cnt, 0, sizeof(cnt));\r\n          for(a=2; a<=n; a++){\r\n               if(ara[a]==0){\r\n                    cnt[a]++;\r\n               }\r\n               else{\r\n                    c=a;\r\n                    for(b=0; b<x && c>1; b++){\r\n                         if(c%prime[b]==0){\r\n                              cnt[prime[b]]++;\r\n                              c=c/prime[b];\r\n                              b--;\r\n                         }\r\n                    }\r\n               }\r\n          }\r\n          printf("Case %d: %d = ", t, n);\r\n          int cn;\r\n          cn=0;\r\n          for(a=0; a<200; a++){\r\n               if(cnt[a]!=0) cn++;\r\n          }\r\n          for(a=0, b=0; a<200; a++){\r\n               if(cnt[a]!=0){\r\n                    if(b<cn-1){\r\n                         printf("%d (%d) * ", a, cnt[a]);\r\n                    }\r\n                    else printf("%d (%d)\\n", a, cnt[a]);\r\n                    b++;\r\n               }\r\n          }\r\n     }\r\n     return 0;\r\n}\r\n'),
(1004, 1058, 'Brush', 'C++', '2017-01-03 04:31:07', 'Accepted', 'sabiha', '#include<bits/stdc++.h>\r\nusing namespace std;\r\nint main(){\r\n     freopen("input.txt", "r", stdin);\r\n     freopen("output.txt", "w", stdout);\r\n    int t, T;\r\n    int n, k, sm;\r\n    scanf("%d", &T);\r\n    for(t=1; t<=T; ++t){\r\n        scanf("%d", &n);\r\n        sm=0;\r\n        while(n--){\r\n            scanf("%d", &k);\r\n            if(k>0) sm+=k;\r\n        }\r\n        printf("Case %d: %d\\n", t, sm);\r\n    }\r\n    return 0;\r\n}\r\n\r\n'),
(1008, 1059, 'Back to Underworld', 'C++', '2017-01-03 04:31:33', 'Wrong Answer', 'sabiha', '#include<bits/stdc++.h>\r\nusing namespace std;\r\nint main(){\r\n     freopen("input.txt", "r", stdin);\r\n     freopen("output.txt", "w", stdout);\r\n    int t, T;\r\n    int n, k, sm;\r\n    scanf("%d", &T);\r\n    for(t=1; t<=T; ++t){\r\n        scanf("%d", &n);\r\n        sm=0;\r\n        while(n--){\r\n            scanf("%d", &k);\r\n            if(k>0) sm+=k;\r\n        }\r\n        printf("Case %d: %d\\n", t, sm);\r\n    }\r\n    return 0;\r\n}\r\n\r\n'),
(1008, 1060, 'Back to Underworld', 'C++', '2017-01-03 04:57:34', 'Wrong Answer', 'ashik', '#include<bits/stdc++.h>\r\nusing namespace std;\r\nint main(){\r\n     freopen("input.txt", "r", stdin);\r\n     freopen("output.txt", "w", stdout);\r\n    int t, T;\r\n    int n, k, sm;\r\n    scanf("%d", &T);\r\n    for(t=1; t<=T; ++t){\r\n        scanf("%d", &n);\r\n        sm=0;\r\n        while(n--){\r\n            scanf("%d", &k);\r\n            if(k>0) sm+=k;\r\n        }\r\n        printf("Case %d: %d\\n", t, sm);\r\n    }\r\n    return 0;\r\n}\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE IF NOT EXISTS `contest` (
  `CId` int(6) NOT NULL,
  `CName` varchar(100) NOT NULL,
  `CTime` datetime NOT NULL,
  `CDuration` int(11) NOT NULL,
  `CPNumber` int(11) NOT NULL,
  `CAuthor` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100077 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`CId`, `CName`, `CTime`, `CDuration`, `CPNumber`, `CAuthor`) VALUES
(100076, 'First Contest!', '2017-01-05 10:00:00', 60, 2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `contestcode`
--

CREATE TABLE IF NOT EXISTS `contestcode` (
  `csubmission_id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `problem_serial` char(1) NOT NULL,
  `c_problemName` varchar(50) NOT NULL,
  `team_name` varchar(50) NOT NULL,
  `c_language` varchar(10) NOT NULL,
  `c_verdict` varchar(30) NOT NULL,
  `penalty` int(11) NOT NULL,
  `c_source` text NOT NULL,
  `c_submissionTime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contestrank`
--

CREATE TABLE IF NOT EXISTS `contestrank` (
  `contestId` int(11) NOT NULL,
  `tName` varchar(50) NOT NULL,
  `totalSolved` int(11) NOT NULL,
  `totalPenalty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cproblems`
--

CREATE TABLE IF NOT EXISTS `cproblems` (
  `CId` int(11) NOT NULL,
  `PSerial` varchar(1) NOT NULL,
  `CPName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cproblems`
--

INSERT INTO `cproblems` (`CId`, `PSerial`, `CPName`) VALUES
(100076, 'A', 'Simple sum'),
(100076, 'B', 'Po2');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE IF NOT EXISTS `problems` (
  `problem_id` int(11) NOT NULL,
  `problem_name` varchar(50) NOT NULL,
  `problem_category` varchar(30) NOT NULL,
  `problem_setter` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `sample_input` varchar(100) NOT NULL,
  `sample_output` varchar(100) NOT NULL,
  `time_limit` varchar(30) NOT NULL,
  `memory_limit` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1009 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`problem_id`, `problem_name`, `problem_category`, `problem_setter`, `description`, `sample_input`, `sample_output`, `time_limit`, `memory_limit`) VALUES
(1001, 'Simple Sum', 'Beginner', 'Sabiha Anan', 'Description:\nX=a1+a2+a3+... +an, where ai (1<=i<=n) is a positive integer number\nMr. Y thinks X is complicated. He asks for your help to make X simple. So, given the expression for X you have to simplify it, i.e. simply find the sum of the given positive integer numbers.\nInput:\nThe only line of the input contains the mathematical expression in the form a1+a2+...+an (1<=ai<=10000). It is guaranteed that the number of â€˜+â€™ is not greater than 100000.\nOutput:\nFirst print â€œX=â€ and then show the answer to the problem.\n', '130+40+27\r\n1000+100+10+1', 'X=197\r\nX=1111', '1', '512 MB'),
(1002, 'Po2', 'Medium', 'Billal Hossain', 'Description\n\r\nâ€˜Aâ€™ lives in a beautiful country â€˜Xâ€™ where each city is named with a hexadecimal number. As â€˜Aâ€™ loves to travel. He decided to visit all the Po2 cities of â€˜Xâ€™. A city is known as a Po2 city if the city name is power of two in the decimal representation. So, given the name of a city can you tell him whether he will visit this city or not.\r\nInput:\r\nFirst line of the input contains length of the city name n (1<=n<=100000). Then the following line contains n hexadecimal digits, name of the city. It is guaranteed that each digits will be between numbers (0 to 9) and Capital letters (A to F).\r\nOutput:\r\nPrint â€˜YESâ€™ if the given number is a Po2 city in decimal representation. Otherwise, print â€˜Noâ€™ (without the quotes).\r\n', '10\r\nAB1C', 'YES\r\nNO', '.5 second', '512 KB'),
(1003, 'nth Term', 'Hard', 'Billal Hossain', 'Description:\n\r\nYou have to find the nth term of the following function:\r\n\r\nf(n)      = a * f(n-1) + b * f(n-3) + c, if(n > 2)\r\n\r\n          = 0, if(n â‰¤ 2)\r\nInput\r\n\r\nInput starts with an integer T (â‰¤ 100), denoting the number of test cases.\r\n\r\nEach case contains four integers n (0 â‰¤ n â‰¤ 108), a b c (1 â‰¤ a, b, c â‰¤ 10000).\r\nOutput\r\n\r\nFor each case, print the case number and f(n) modulo 10007.', '2\r\n10 1 2 3\r\n5 1 3 9', 'Case 1: 162\r\nCase 2: 27', '.1 second', '512 KB'),
(1004, 'Brush', 'Advanced', 'Billal Hossain', 'Description:\n\r\nSometimes I feel angry to arrange contests, because I am too lazy. Today I am arranging a contest for AIUB students. So, I made a plan. While they will be busy with the contest, as a punishment I will cover their rooms with dusts. So, when they will be back, they will surely get angry, and it will cause them some pain.\r\n\r\nSo, at first, I will make up my mind, that means I will fix the amount of dusts for each student. This amount may not be same for all. Now you are given the amount of dust unit for each student. You have to help me finding the total dust unit I have to collect to cause them pain.\r\n\r\nBut there is a problem, my random function which generates dust units for students has a bug, it sometimes returns negative numbers. If a student gets negative number, I think he is lucky, so I will not cause him any pain with dusts.\r\nInput\r\n\r\nInput starts with an integer T (â‰¤ 100), denoting the number of test cases.\r\n\r\nEach case starts with a blank line. The next line con', '2\r\n\r\n3\r\n1 5 10\r\n\r\n2\r\n1 99', 'Case 1: 16\r\n\r\nCase 2: 1000', '.5 seconds', '512 KB'),
(1005, 'Opposite Task', 'Beginner', 'Sabiha Anan', 'Description:\n\r\nThis problem gives you a flavor the concept of special judge. That means the judge is smart enough to verify your code even though it may print different results. In this problem you are asked to find the opposite task of the previous problem.\r\n\r\nTo be specific, I have two computers where I stored my problems. Now I know the total number of problems is n. And there are no duplicate problems and there can be at most 10 problems in each computer. You have to find the number of problems in each of the computers.\r\n\r\nSince there can be multiple solutions. Any valid solution will do.\r\nInput\r\n\r\nInput starts with an integer T (â‰¤ 25), denoting the number of test cases.\r\n\r\nEach case starts with a line containing an integer n (0 â‰¤ n â‰¤ 20) denoting the total number of problems.\r\nOutput\r\n\r\nFor each case, print the number of problems stored in each computer in a single line. A single space should separate the non-negative integers.', '3\r\n\r\n10\r\n7\r\n7', '0 10\r\n\r\n0 7\r\n\r\n1 6', '.5 seconds', '512 KB'),
(1006, 'Intelligent Factorial Factorization', 'Medium', 'Sabiha Anan', 'Description:\n\r\nGiven an integer N, you have to prime factorize N! (factorial N).\r\nInput\r\n\r\nInput starts with an integer T (â‰¤ 125), denoting the number of test cases.\r\n\r\nEach case contains an integer N (2 â‰¤ N â‰¤ 100).\r\nOutput\r\n\r\nFor each case, print the case number and the factorization of the factorial in the following format as given in samples.\r\n\r\nCase x: N = p1 (power of p1) * p2 (power of p2) * ...\r\n\r\nHere x is the case number, p1, p2 ... are primes in ascending order.', '3\r\n\r\n2\r\n3\r\n6', 'Case 1: 2 = 2 (1)\r\nCase 2: 3 = 2 (1) * 3 (1)\r\nCase 3: 6 = 2 (4) * 3 (2) * 5 (1)', '.5 seconds', '512 KB'),
(1007, 'Number Transformation', 'Advanced', 'Billal Hossain', 'Description:\nIn this problem,you are given an integer s. you can transform any integer number A to another integer number B by adding X to A. This X is an integer number which is the prime factor of A. Now you are taskedto find the minimum number of transformation required to transform s to another integer number t.\nInput:\nInput starts with an integer T(<=500),denoting the number of test cases.\nEach case contains two integers: s (1 <= s <= 100) and t (1 <= t <= 1000).\nOutput:\nFor each case, print the case number and the minimum number of transformations needed. If it''s impossible, then print -1.\n', '2\r\n\r\n6 12\r\n6 13', 'Case 1: 2\r\nCase 2: -1', '1 second', '512 KB'),
(1008, 'Back to Underworld', 'Hard', 'Billal Hossain', 'Description:\nThe Vampires and Lykans are fighting each other to death. The war has become so fierce that, none knows who will win. The humans want to know who will survive finally. But humans are afraid of going to the battlefield.\n\nSo, they made a plan. They collected the information from the newspapers of Vampires and Lykans. They found the information about all the dual fights. Dual fight means a fight between a Lykan and a Vampire. They know the name of the dual fighters, but don''t know which one of them is a Vampire or a Lykan.\n\nSo, the humans listed all the rivals. They want to find the maximum possible number of Vampires or Lykans.\nInput\n\nInput starts with an integer T (<= 10), denoting the number of test cases.\n\nEach case contains an integer n (1 <= n <= 100000), denoting the number of dual fights. Each of the next n lines will contain two different integers u v (1 <= u, v <= 20000) denoting there was a fight between u and v. No rival will be reported more than once.\nOutput\n\nFor each case, print the case number and the maximum possible members of any race.', '2\n\n2\n1 2\n2 3\n3\n1 2\n2 3\n4 2', 'Case 1: 2\nCase 2: 3', ' 1 second', ' 512 KB');

-- --------------------------------------------------------

--
-- Table structure for table `ranklist`
--

CREATE TABLE IF NOT EXISTS `ranklist` (
  `uname` varchar(50) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranklist`
--

INSERT INTO `ranklist` (`uname`, `rank`) VALUES
('bi11a1', 1),
('sabiha', 1);

-- --------------------------------------------------------

--
-- Table structure for table `solve`
--

CREATE TABLE IF NOT EXISTS `solve` (
  `prob_id` int(11) NOT NULL,
  `UName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solve`
--

INSERT INTO `solve` (`prob_id`, `UName`) VALUES
(1001, 'bi11a1'),
(1001, 'sabiha'),
(1004, 'bi11a1'),
(1004, 'sabiha'),
(1006, 'bi11a1'),
(1006, 'sabiha');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `Team_Name` varchar(30) NOT NULL,
  `Team_Password` varchar(30) NOT NULL,
  `Cntst_Id` varchar(30) NOT NULL,
  `Contestant1` varchar(30) NOT NULL,
  `Contestant2` varchar(30) NOT NULL,
  `Contestant3` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `institution_name` varchar(70) DEFAULT NULL,
  `country_name` varchar(50) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `email`, `user_password`, `reg_date`, `institution_name`, `country_name`, `image`) VALUES
('admin', 'admin@gmail.com', 'samsung', '2017-01-02 11:18:08', '', NULL, NULL),
('ashik', 'ashik@yahoo.com', '11111', '2017-01-02 20:34:36', 'AUST', 'BELARUS', NULL),
('bi11a1', 'mhbillal160@gmail.com', 'sssss', '2017-01-02 11:18:58', 'CUET', 'BANGLADESH', 'images/34e930b6b6.jpg'),
('nafiza', 'nafiza@gmail.com', '09876', '2017-01-02 20:31:50', NULL, NULL, NULL),
('s4k1b', 's4k1b@gmail.com', '12345', '2017-01-02 20:33:39', NULL, NULL, NULL),
('sabiha', 'sabiha@yahoo.com', '12345', '2017-01-02 20:31:10', 'KUET', 'AUSTRIA', 'images/ce24f8fa73.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`submission_id`);

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`CId`);

--
-- Indexes for table `contestcode`
--
ALTER TABLE `contestcode`
  ADD PRIMARY KEY (`csubmission_id`);

--
-- Indexes for table `contestrank`
--
ALTER TABLE `contestrank`
  ADD PRIMARY KEY (`contestId`,`tName`);

--
-- Indexes for table `cproblems`
--
ALTER TABLE `cproblems`
  ADD PRIMARY KEY (`CId`,`PSerial`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`problem_id`);

--
-- Indexes for table `ranklist`
--
ALTER TABLE `ranklist`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `solve`
--
ALTER TABLE `solve`
  ADD PRIMARY KEY (`prob_id`,`UName`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`Team_Name`,`Cntst_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1061;
--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `CId` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100077;
--
-- AUTO_INCREMENT for table `contestcode`
--
ALTER TABLE `contestcode`
  MODIFY `csubmission_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `problem_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1009;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
