*** Settings ***
Library    Selenium2Library

*** Variables ***
${SERVER}         10.199.66.227
${BROWSER}        Chrome
${INDEX URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/
${LOGIN URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Models/Login.php
${HOME URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Views/studentinclasslist.php
${VALID LECTURER USERNAME}    lecturer
${VALID LECTURER PASSWORD}    ABCdef123
${VALID TA USERNAME}    student_ta@kkumail.com
${VALID TA PASSWORD}    ABCdef123
${INVALID LECTURER USERNAME}    lec
${INVALID LECTURER PASSWORD}    ABCdef
${INVALID TA USERNAME}    student_ta@kku
${INVALID TA PASSWORD}    ABCdef
${HOME TITLE}    Class List
${TA LOGIN SUCCESS MESSAGE}    Hello " TA " Welcome Back !
${LECTURER LOGIN SUCCESS MESSAGE}    Hello " lecturer " Welcome Back !
${DELAY}    0.5

*** Test Cases ***
ํT01 Lecturer Sign in Success
  Open Browser    ${INDEX URL}    ${BROWSER}
  Set Selenium Speed     ${DELAY}
  Location Should Be    ${INDEX URL}
  Input Text    username    ${VALID LECTURER USERNAME}
  Input Text    password    ${VALID LECTURER PASSWORD}
  Click Button    signin
  Location Should Contain    ${HOME URL}
  Wait Until Page Contains    ${HOME TITLE}
   Wait Until Page Contains    ${LECTURER LOGIN SUCCESS MESSAGE}
  [Teardown]    Close Browser
  
T02 TA Sign in Success
  Open Browser    ${INDEX URL}    ${BROWSER}
  Set Selenium Speed     ${DELAY}
  Location Should Be    ${INDEX URL}
  Input Text    username    ${VALID TA USERNAME}
  Input Text    password    ${VALID TA PASSWORD}
  Click Button    signin
  Location Should Contain    ${HOME URL}
  Wait Until Page Contains    ${HOME TITLE}
  Wait Until Page Contains    ${TA LOGIN SUCCESS MESSAGE}
  [Teardown]    Close Browser


  

