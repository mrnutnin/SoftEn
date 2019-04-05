*** Settings ***
Library    Selenium2Library

*** Variables ***
${SERVER}         10.199.66.227
${BROWSER}        Chrome
${INDEX URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/
${LOGIN URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Models/Login.php
${HOME URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Views/studentinclasslist.php
${LOCAL INDEX URL}    http://localhost/SoftEn/
${LOCAL HOME URL}    http://localhost/SoftEn/Views/studentinclasslist.php
${LOCAL LOGIN URL}    http://localhost/SoftEn/Models/Login.php
${VALID LECTURER USERNAME}    lecturer
${VALID LECTURER PASSWORD}    ABCdef123
${VALID TA USERNAME}    student_ta@kkumail.com
${VALID TA PASSWORD}    ABCdef123
${INVALID LECTURER USERNAME}    lec
${INVALID LECTURER PASSWORD}    ABCdef
${INVALID TA USERNAME}    student_ta@kku
${INVALID TA PASSWORD}    ABCdef
${EMPTY USERNAME MESSAGE}    *Please enter your Username!!
${EMPTY PASSWORD MESSAGE}    *Please enter your Password!!
${EMPTY USER AND PASS MESSAGE}    *Please enter your Username and Password!!
${ERROR LOGIN MESSAGE}    Invalid Username or Password!
${HOME MESSAGE}    Class List
${TA LOGIN SUCCESS MESSAGE}    Hello " TA " Welcome Back !
${LECTURER LOGIN SUCCESS MESSAGE}    Hello " lecturer " Welcome Back !
${DELAY}    0.5

*** Test Cases ***
T01 Open Index Page
  Open Browser    ${INDEX URL}    ${BROWSER}
  Set Selenium Speed     ${DELAY}
  Maximize Browser Window
  Location Should Be    ${INDEX URL}

T02 Lecturer Sign In Empty Username
  Input Text    username    ${EMPTY}
  Input Text    password    ${VALID LECTURER PASSWORD}
  Click Button    signin
  Location Should Contain    ${INDEX URL} 
  Wait Until Page Contains    ${EMPTY USERNAME MESSAGE}

T03 Lecturer Sign In Empty Password 
  Input Text    username    ${VALID LECTURER USERNAME}
  Input Text    password    ${EMPTY}
  Click Button    signin
  Location Should Contain    ${INDEX URL} 
  Wait Until Page Contains    ${EMPTY PASSWORD MESSAGE}

T04 Lecturer Sign In Empty Username And Password
  Input Text    username    ${EMPTY}
  Input Text    password    ${EMPTY}
  Click Button    signin
  Location Should Contain    ${INDEX URL} 
  Wait Until Page Contains    ${EMPTY USER AND PASS MESSAGE}

T05 Lecturer Sign In Invalid Username
  Input Text    username    ${INVALID LECTURER USERNAME}
  Input Text    password    ${VALID LECTURER PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

T06 Lecturer Sign In Invalid Password
  Input Text    username    ${VALID LECTURER USERNAME}
  Input Text    password    ${INVALID LECTURER PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

T07 Lecturer Sign In Invalid Username And Password
  Input Text    username    ${INVALID LECTURER USERNAME}
  Input Text    password    ${INVALID LECTURER PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

T08 TA Sign In Empty Username
  Input Text    username    ${EMPTY}
  Input Text    password    ${VALID TA PASSWORD}
  Click Button    signin
  Location Should Contain    ${INDEX URL} 
  Wait Until Page Contains    ${EMPTY USERNAME MESSAGE}

T09 TA Sign In Empty Password 
  Input Text    username    ${VALID TA USERNAME}
  Input Text    password    ${EMPTY}
  Click Button    signin
  Location Should Contain    ${INDEX URL} 
  Wait Until Page Contains    ${EMPTY PASSWORD MESSAGE}

T10 TA Sign In Empty Username And Password
  Input Text    username    ${EMPTY}
  Input Text    password    ${EMPTY}
  Click Button    signin
  Location Should Contain    ${INDEX URL} 
  Wait Until Page Contains    ${EMPTY USER AND PASS MESSAGE}

T11 TA Sign In Invalid Username
  Input Text    username    ${INVALID TA USERNAME}
  Input Text    password    ${VALID TA PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

T12 TA Sign In Invalid Password
  Input Text    username    ${VALID TA USERNAME}
  Input Text    password    ${INVALID TA PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

T13 TA Sign In Invalid Username And Password
  Input Text    username    ${INVALID TA USERNAME}
  Input Text    password    ${INVALID TA PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}
  [Teardown]    Close Browser

