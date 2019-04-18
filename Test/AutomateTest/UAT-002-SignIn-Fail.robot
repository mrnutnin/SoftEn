*** Settings ***
Library    Selenium2Library

*** Variables ***
${SERVER}         10.199.66.227
${BROWSER}        Chrome
${INDEX URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/
${LOGIN URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Models/CheckLogin.php
${HOME URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Views/ClassList.php
${VALID LECTURER USERNAME}    chitsutha
${VALID LECTURER PASSWORD}    ABCdef123
${VALID TA USERNAME}    student_ta@kkumail.com
${VALID TA PASSWORD}    ABCdef123
${VALID STUDENT USERNAME}    sompong_student@kkumail.com
${VALID STUDENT PASSWORD}    ABCdef123
${INVALID LECTURER USERNAME}    chitsuthaaa
${INVALID LECTURER PASSWORD}    ABCdef
${INVALID TA USERNAME}    student_ta@kku
${INVALID TA PASSWORD}    ABCdef
${INVALID STUDENT USERNAME}    sompong_student@kku
${INVALID STUDENT PASSWORD}    ABCdef
${VALID TA2 USERNAME}    somyod@kkumail.com
${VALID TA2 PASSWORD}    ABCdef123
${INVALID TA2 USERNAME}    somyod@kku
${INVALID TA2 PASSWORD}    ABCdef
${EMPTY USERNAME MESSAGE}    *Please enter your Username!!
${EMPTY PASSWORD MESSAGE}    *Please enter your Password!!
${EMPTY USER AND PASS MESSAGE}    *Please enter your Username and Password!!
${ERROR LOGIN MESSAGE}    *Invalid Username or Password!
${ERROR LOGIN 3TIME MESSAGE}    *This account is Lock!, Please contact support.
${HOME MESSAGE}    Class List
${TA LOGIN SUCCESS MESSAGE}    Hello " TA " Welcome Back !
${LECTURER LOGIN SUCCESS MESSAGE}    Hello " chitsutha " Welcome Back !
${STUDENT LOGIN SUCCESS MESSAGE}    Hello " sompong " Welcome Back !
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
  Run Keyword And Expect Error
    ...    Alert with message '${EMPTY USERNAME MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

T03 Lecturer Sign In Empty Password 
  Input Text    username    ${VALID LECTURER USERNAME}
  Input Text    password    ${EMPTY}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${EMPTY PASSWORD MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

T04 Lecturer Sign In Empty Username And Password
  Input Text    username    ${EMPTY}
  Input Text    password    ${EMPTY}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${EMPTY USER AND PASS MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

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
  Run Keyword And Expect Error
    ...    Alert with message '${EMPTY USERNAME MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

T09 TA Sign In Empty Password 
  Input Text    username    ${VALID TA USERNAME}
  Input Text    password    ${EMPTY}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${EMPTY PASSWORD MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

T10 TA Sign In Empty Username And Password
  Input Text    username    ${EMPTY}
  Input Text    password    ${EMPTY}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${EMPTY USER AND PASS MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

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

T14 Student Sign In Empty Username
  Input Text    username    ${EMPTY}
  Input Text    password    ${VALID STUDENT PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${EMPTY USERNAME MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

T15 Student Sign In Empty Password 
  Input Text    username    ${VALID STUDENT USERNAME}
  Input Text    password    ${EMPTY}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${EMPTY PASSWORD MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

T16 Student Sign In Empty Username And Password
  Input Text    username    ${EMPTY}
  Input Text    password    ${EMPTY}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${EMPTY USER AND PASS MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

T17 Student Sign In Invalid Username
  Input Text    username    ${INVALID STUDENT USERNAME}
  Input Text    password    ${VALID STUDENT PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

T18 Student Sign In Invalid Password
  Input Text    username    ${VALID STUDENT USERNAME}
  Input Text    password    ${INVALID STUDENT PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

T19 Student Sign In Invalid Username And Password
  Input Text    username    ${INVALID STUDENT USERNAME}
  Input Text    password    ${INVALID STUDENT PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

T20 User Sign In Invalid Password 3 Time Then Account Is Lock 
  Input Text    username    ${VALID TA2 USERNAME}
  Input Text    password    ${INVALID TA2 PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}
  Input Text    username    ${VALID TA2 USERNAME}
  Input Text    password    ${INVALID TA2 PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}
  Input Text    username    ${VALID TA2 USERNAME}
  Input Text    password    ${INVALID TA2 PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}
  Input Text    username    ${VALID TA2 USERNAME}
  Input Text    password    ${INVALID TA2 PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN 3TIME MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}
  [Teardown]    Close Browser