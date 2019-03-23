*** Settings ***
Library    Selenium2Library

*** Variables ***
${SERVER}         10.199.66.227
${BROWSER}        Chrome
${INDEX URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/
${LOGIN URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Models/Login.php
${HOME URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Views/studentinclasslist.php
${STUDENTLIST URL}
${VALID LECTURER USERNAME}    lecturer
${VALID LECTURER PASSWORD}    lecturer
${VALID TA USERNAME}    ta
${VALID TA PASSWORD}    ta
${INVALID LECTURER USERNAME}    lec
${INVALID LECTURER PASSWORD}    lec
${INVALID TA USERNAME}    t
${INVALID TA PASSWORD}    t
${INVALID TA PASSWORD}    t
${ERROR INPUT MESSAGE}    โปรดกรอกฟิลด์นี้
${ERROR LOGIN MESSAGE}    Login Fail!
${HOME TITLE}    Class List
${TA LOGIN SUCCESS MESSAGE}    Hello " lecturer " Welcome Back !
${LECTURER LOGIN SUCCESS MESSAGE}    Hello " TA " Welcome Back !

*** Test cases ***
Lecturer Sign in Success
  Open Browser    ${INDEX URL}    ${BROWSER}
  Location Should Be    ${INDEX URL}
  Input Text    username    ${VALID LECTURER USERNAME}
  Input Text    password    ${VALID LECTURER PASSWORD}
  Click Button    signin
  Location Should Contain    ${HOME URL}
  Title Should Be    ${HOME TITLE}
  Wait Until Page Contains    ${TA LOGIN SUCCESS MESSAGE}
  [Teardown]    Close Browser

TA Sign in Success
  Open Browser    ${INDEX URL}    ${BROWSER}
  Location Should Be    ${INDEX URL}
  Input Text    username    ${VALID TA USERNAME}
  Input Text    password    ${VALID TA PASSWORD}
  Click Button    signin
  Location Should Contain    ${HOME URL}
  Title Should Be    ${HOME TITLE}
  Wait Until Page Contains    ${LECTURER LOGIN SUCCESS MESSAGE} 
  [Teardown]    Close Browser