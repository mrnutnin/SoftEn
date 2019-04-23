*** Settings ***
Library    Selenium2Library

*** Variables ***
${SERVER}         10.199.66.227
${BROWSER}        Chrome
${INDEX URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/
${LOGIN URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Models/CheckLoginh.php
${HOME URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Views/ClassList.php
${INDEX URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/
${VALID TA USERNAME}    student_ta@kkumail.com
${VALID TA PASSWORD}    ABCdef123
${TA LOGIN SUCCESS MESSAGE}    Hello " TA " Welcome Back !
${ALERT}    Are you sure?!
${DELAY}    0.5
${HOME TITLE}    Class List

*** Test Cases ***
ํT01 TA Delete Class Success
  Open Browser    ${INDEX URL}    ${BROWSER}
  Set Selenium Speed     ${DELAY}
  Location Should Be    ${INDEX URL}
  Input Text    username    ${VALID TA USERNAME}
  Input Text    password    ${VALID TA PASSWORD}
  Click Button    signin
  Location Should Contain    ${HOME URL}
  Wait Until Page Contains    ${HOME TITLE}
  Wait Until Page Contains    ${TA LOGIN SUCCESS MESSAGE}
  Click Button    //*[@id="example"]/tbody/tr/td[7]/button[2]
  Run Keyword And Expect Error
    ...    Alert with message '${ALERT}' present.
    ...    Alert Should Not Be Present
  Location Should Be    ${HOME URL}
  [Teardown]    Close Browser