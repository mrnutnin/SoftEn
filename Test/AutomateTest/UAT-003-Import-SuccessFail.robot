*** Settings ***
Library    Selenium2Library

*** Variables ***
${SERVER}         10.199.66.227
${BROWSER}        Chrome
${CLASSDETAIL URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Views/ClassDetail.php
${INDEX URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/
${LOGIN URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Models/CheckLoginh.php
${HOME URL}    http://${SERVER}/SoftEn2019/Sec2/Last%20group/Views/ClassList.php
${ALERT SUCCESS}    Insert File Succes
${ALERT FAIL}    Invalid File
${DELAY}    0.5
${VALID TA USERNAME}    student_ta@kkumail.com
${VALID TA PASSWORD}    ABCdef123
${HOME TITLE}    Class List
${TA LOGIN SUCCESS MESSAGE}    Hello " TA " Welcome Back !

*** Test Cases ***
ํT01 Import Success
  Open Browser    ${INDEX URL}    ${BROWSER}
  Maximize Browser Window
  Set Selenium Speed     ${DELAY}
  Location Should Be    ${INDEX URL}
  Input Text    username    ${VALID TA USERNAME}
  Input Text    password    ${VALID TA PASSWORD}
  Click Button    signin
  Location Should Contain    ${HOME URL}
  Wait Until Page Contains    ${HOME TITLE}
  Wait Until Page Contains    ${TA LOGIN SUCCESS MESSAGE}
  Click button    //*[@id="example"]/tbody/tr/td[7]/button[1]
  Click button    excel
  Choose File    id=fileToUpload    d:\\Student.csv
  click button    import    
  Wait Until Page Contains    ${ALERT SUCCESS} 
  [Teardown]    Close Browser


T01 Import Fail
  Open Browser    ${INDEX URL}    ${BROWSER}
  Maximize Browser Window
  Set Selenium Speed     ${DELAY}
  Location Should Be    ${INDEX URL}
  Input Text    username    ${VALID TA USERNAME}
  Input Text    password    ${VALID TA PASSWORD}
  Click Button    signin
  Location Should Contain    ${HOME URL}
  Wait Until Page Contains    ${HOME TITLE}
  Wait Until Page Contains    ${TA LOGIN SUCCESS MESSAGE}
  Click button    //*[@id="example"]/tbody/tr/td[7]/button[1]
  Click button    excel
  Choose File    id=fileToUpload    d:\\Student.csv
  click button    import    
  Wait Until Page Contains    ${ALERT FAIL} 
  [Teardown]    Close Browser
