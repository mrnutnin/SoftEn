*** Settings ***
Library    Selenium2Library

*** Variables ***
${SERVER}         10.199.66.227
${BROWSER}        Chrome
${HOME URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Views/ClassList.php
${CREATECLASS URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Views/CreateClass.php
${LOGIN URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Models/CheckLoginh.php
${HOME URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Views/ClassList.php
${INDEX URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/
${VALID TA USERNAME}    student_ta@kkumail.com
${VALID TA PASSWORD}    ABCdef123
${SUBJECT}    PRINCIPLE
${LECTURER}    chitsutha
${SUBJECTCODE}    322761
${DETAIL}    VERYGOOD
${SECTION TA}    3  
${SECTION LECTURER}    1 
${TERM}    1
${YEAR}    2562
${DELAY}    0.5

*** Test Cases ***
ํT01 Ta Create Class Success
  Open Browser    ${INDEX URL}    ${BROWSER}
  Maximize Browser Window
  Set Selenium Speed     ${DELAY}
  Location Should Be    ${INDEX URL}
  Input Text    username    ${VALID TA USERNAME}
  Input Text    password    ${VALID TA PASSWORD}
  Click Button    signin
  Location Should Contain    ${HOME URL}
  Click Button    //*[@id="demo"]/button[2]
  Location Should Contain    ${CREATECLASS URL}
  Input Text    subjectName   ${SUBJECT}
  Input Text    subjectCode    ${SUBJECTCODE}
  Input Text    detail    ${DETAIL}
  Select From List    lecturer   ${LECTURER}
  Input Text    section    ${SECTION TA}
  Input Text    year    ${YEAR}
  Select From List    term    ${TERM}
  Click Button    create
  Location Should Be    ${HOME URL}
  Wait Until Page Contains    ${SUBJECT}
  Wait Until Page Contains    ${SUBJECTCODE}
  [Teardown]    Close Browser

