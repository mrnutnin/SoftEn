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
${EDITSTUDENT URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Views/EditStudent.php
${INDEX URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/
${VALID TA USERNAME}    student_ta@kkumail.com
${VALID LECTURER USERNAME}    chitsutha
${VALID LECTURER&TA PASSWORD}    ABCdef123
${SID}    593020032-1
${SNAME}    นายกษิดิ์เดช ก้าน
${status}    ถอน
${DELAY}    0.5

*** Test Cases ***
ํT01 Ta Delete Student Success
  Open Browser    ${INDEX URL}    ${BROWSER}
  Maximize Browser Window
  Set Selenium Speed     ${DELAY}
  Location Should Be    ${INDEX URL}
  Input Text    username    ${VALID TA USERNAME}
  Input Text    password    ${VALID LECTURER&TA PASSWORD}
  Click Button    signin
  Location Should Contain    ${HOME URL}
  Click Button    //*[@id="example"]/tbody/tr/td[7]/button[1]
  Click Button    delete
  Handle Alert
  Location Should Contain    ${CLASSDETAIL URL}
  Wait Until Page Does Not Contain    ${SNAME}
  [Teardown]    Close Browser

