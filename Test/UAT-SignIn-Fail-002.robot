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
${VALID LECTURER PASSWORD}    lecturer
${VALID TA USERNAME}    ta
${VALID TA PASSWORD}    ta
${INVALID LECTURER USERNAME}    lec
${INVALID LECTURER PASSWORD}    lec
${INVALID TA USERNAME}    t
${INVALID TA PASSWORD}    t
${EMPTY USERNAME MESSAGE}    *Please enter your Username!!
${EMPTY PASSOWRD MESSAGE}    *Please enter your Password!!
${EMPTY USER AND PASS MESSAGE}    *Please enter your Username and Password!!
${ERROR LOGIN MESSAGE}    Invalid Username or Password!
${HOME MESSAGE}    Class List
${TA LOGIN SUCCESS MESSAGE}    Hello " TA " Welcome Back !
${LECTURER LOGIN SUCCESS MESSAGE}    Hello " lecturer " Welcome Back !
${DELAY}    0.4

*** Test Cases ***
Open Index Page
  Open Browser    ${INDEX URL}    ${BROWSER}
  Set Selenium Speed     ${DELAY}
  Maximize Browser Window
  Location Should Be    ${INDEX URL}

Lecturer Sign In Empty Username
  Input Text    password    ${VALID LECTURER PASSWORD}
  Click Button    signin
  Location Should Contain    ${INDEX URL} 
  Wait Until Page Contains    ${EMPTY USERNAME MESSAGE}

Lecturer Sign In Empty Password 
  Input Text    username    ${VALID LECTURER USERNAME}
  Click Button    signin
  Location Should Contain    ${INDEX URL} 
  Wait Until Page Contains    ${EMPTY PASSWORD MESSAGE}

Lecturer Sign In Empty Username And Password
  Click Button    signin
  Location Should Contain    ${INDEX URL} 
  Wait Until Page Contains    ${EMPTY USER AND PASS MESSAGE}

Lecturer Sign In Invalid Username
  Input Text    username    ${VALID LECTURER USERNAME}
  Input Text    password    ${INVALID LECTURER PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

Lecturer Sign In Invalid Password
  Input Text    username    ${INVALID LECTURER USERNAME}
  Input Text    password    ${VALID LECTURER PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}

Lecturer Sign In Invalid Username And Password
  Input Text    username    ${INVALID LECTURER USERNAME}
  Input Text    password    ${INVALID LECTURER PASSWORD}
  Click Button    signin
  Run Keyword And Expect Error
    ...    Alert with message '${ERROR LOGIN MESSAGE}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${INDEX URL}




  [Teardown]    Close Browser



