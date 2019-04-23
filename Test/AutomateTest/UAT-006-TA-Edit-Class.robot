*** Settings ***
Library    Selenium2Library

*** Variables ***
${SERVER}         10.199.66.227
${BROWSER}        Chrome
${HOME URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Views/ClassList.php
${CLASSDETAIL URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Views/ClassDetail.php
${LOGIN URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Models/CheckLoginh.php
${HOME URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Views/ClassList.php
${EDITCLASS URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Views/EditClass.php
${INDEX URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/
${VALID TA USERNAME}    student_ta@kkumail.com
${VALID LECTURER USERNAME}    chitsutha
${VALID LECTURER&TA PASSWORD}    ABCdef123
${SUBJECT}    MIT
${LECTURER}    chitsutha
${SUBJECTCODE}    322761
${DETAIL}    VERYGOOD
${SECTION TA}    3  
${TERM}    1
${YEAR}    2562
${DELAY}    0.5

*** Test Cases ***
ํT01 Ta Edit Class Success
  Open Browser    ${INDEX URL}    ${BROWSER}
  Maximize Browser Window
  Set Selenium Speed     ${DELAY}
  Location Should Be    ${INDEX URL}
  Input Text    username    ${VALID TA USERNAME}
  Input Text    password    ${VALID LECTURER&TA PASSWORD}
  Click Button    signin
  Location Should Contain    ${HOME URL}
  Click Button    //*[@id="example"]/tbody/tr/td[7]/button[1]
  Location Should Contain    ${CLASSDETAIL URL}
  Click Button    editclass
  Location Should Contain    ${EDITCLASS URL}
  Input Text    subjectName   ${SUBJECT}
  Input Text    subjectCode    ${SUBJECTCODE}
  Input Text    detail    ${DETAIL}
  Select From List    lecturer   ${LECTURER}
  Input Text    section    ${SECTION TA}
  Input Text    year    ${YEAR}
  Select From List   term    ${TERM}
  Click Button    editClass
  Location Should Contain    ${CLASSDETAIL URL}
  Wait Until Page Contains    MIT
  [Teardown]    Close Browser

