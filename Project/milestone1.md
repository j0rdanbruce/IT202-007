# Milestone1 Deliverable (pts. 10.00)
## Instructions
1. Checkout Milestone1 branch
2. Create a milestone1.md file in your Project folder
3. Git add/commit/push this empty file to Milestone1 (you'll need the link later)
4. Fill in the deliverable items
5. Ensure your images display correctly in the sample markdown at the bottom
    - NOTE: You may want to try to capture as much checklist evidence in your screenshots as possible, you do not need individual screenshots and are recommended to combine things when possible. Also, some screenshots may be reused if applicable.
6. Save the submission items
7. Copy/paste the markdown from the "Copy markdown to clipboard link" or via the download button
8. Paste the code into the milestone1.md file or overwrite the file
9. Git add/commit/push the md file to Milestone1
10. Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)
11. Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)
    - Make sure everything looks ok on NJIT's webserver dev
12. Make a pull request from dev to prod (resolve any conflicts)
    - Make sure everything looks ok on NJIT's webserver prod
13. Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)
## Desired Branch Name
### Milestone 1
## Deliverables
---
### Deliverable 1: Feature: User will be able to register a new account (pts. 1)
<ul>

__SubTask 1:__ Add one or more **screenshots** of the application showing the form and validation errors per the feature requirements

<ul>

#### The checkboxes are for your own tracking
    
|    #    | Points | Details        |
| ------- | ------ | --------------:|
| [X] #1  | 1      | Show invalid email validation |
| [ ] #2  | 1      | Show invalid password validation |
| [ ] #3  | 1      | Show passwords not much validation |
| [x ] #4  | 1      | Show email not available validation (already registered) |
| [x] #5  | 1      | Show Login Name not available validation (logName is taken) |
| [X] #6  | 1      | Show the form with valid data filled in before the form is submitted |

#### Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> #1: [Invalid email validation](https://user-images.githubusercontent.com/95323815/204876998-623b5dd5-d344-465a-b013-19c8ef812c4f.png)

> #2: []()

> #3: 

> #4: [email not avilable](https://user-images.githubusercontent.com/95323815/204879455-d2872060-bc02-4dae-8de1-462ff04b6720.png)

> #5: [logName not available](https://user-images.githubusercontent.com/95323815/204878820-d5958f62-c5ad-42a5-99e9-1ebe366cfc0e.png)

> #6: [form data](https://user-images.githubusercontent.com/95323815/204878415-f7351546-b17c-4361-828c-5a7b3f9b15a2.png)

</ul>

__SubTask 2:__ Add **screenshot** of the User table with data in it. The valid user data from Task 1 should be present in this **screenshot**. Clearly highlight which row it is.

<ul>

#### Make sure if the  **screenshot**  contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  [left half of screen](https://user-images.githubusercontent.com/95323815/204880142-836a2a2c-6112-416d-8039-ec13d83933ea.png)

[right half of screen](https://user-images.githubusercontent.com/95323815/204880100-35535084-0b61-4936-9294-f68aa5e25375.png)

</ul>

__SubTask 3:__ Add the related pull request(s) for this feature

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): (https://github.com/j0rdanbruce/IT202-007/pull/9)

</ul> 

__SubTask 4:__ Explain briefly how the process/code works (to register)

<ul>

#### The checkboxes are for your own tracking
     
|    #     | Points | Details                                                  |
| -------- | ------ | --------------------------------------------------------:|
| [ x] #1  | 1       | Explain how the form is handled and behaves             |
| [x ] #2  | 1       | Explain the validation logic (frontend and backend)     |
| [x ] #3  | 1       | Explain how the password is handled                     |
| [x ] #4  | 1       | Explain how the DB is utilized                          |

> #1:  the form accepts user input data for logName, email, and password. the data is then sent to the backend to check for validation of all the sent data. If all data passes the defined requirements then the person has successfully registered an account.

> #2:  the front end uses form elements for the user to input data. The input data has identified names. the identified names via tags are then sent to backend. The backend checks the requirements for the input data. If data passes all requirements then person has successfully registered.

> #3: The password is sent to from the frontend to the backend. The user typed password is checked to meet the criteria of the established "valid password" rules. If passed requirements for a proper password, the password is then encrypted as a password hash. The password hash is a one way encryption so once it is encrypted it can not be decrypted by the user or server side. 

> #4: The DB is utilized to store the form data for each user. Each successfully registered user has a dedicated row in the "User" database. Each column of the USER database represents different types of data such as logName or email or id.

</ul></ul>

### Deliverable 2: Feature: User will be able to login to their account (pts. 1)
<ul>

__SubTask 1:__ Add one or more **screenshots** of the application showing the form and
validation errors per the feature requirements

<ul>

#### The checkboxes are for your own tracking
    
|    #    | Points | Details        |
| ------- | ------ | --------------:|
| [x ] #1  | 1      | Show password mismatch validation (doesn't match what's in the DB) |
| [x ] #2  | 1      | Show validation based on non-existing user |

<br>Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> #1:  [incorrect password](https://user-images.githubusercontent.com/95323815/204882106-7e34c785-d67a-4fd4-9641-c85995e168e0.png)

> #2: [invalid user](https://user-images.githubusercontent.com/95323815/204882683-c7f0ab0e-cef4-462c-8f39-41a1dc52ba80.png)

</ul>

__SubTask 2:__ Add a **screenshot** of successful login

<ul>

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  [successful login](https://user-images.githubusercontent.com/95323815/204882919-bceb2f83-f971-4b29-8ff0-0daa9188f5a4.png)


</ul>

__SubTask 3:__ Add the related pull request(s) for this feature

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): [basic navigation](https://github.com/j0rdanbruce/IT202-007/pull/14)

</ul> 

__SubTask 4:__ Explain briefly how the process/code works (to login)

<ul>

#### The checkboxes are for your own tracking
     
|    #     | Points | Details                                                  |
| -------- | ------ | --------------------------------------------------------:|
| [ x] #1  | 1       | Explain how the form is handled and behaves             |
| [x ] #2  | 1       | Explain the validation logic (frontend and backend)     |
| [ x] #3  | 1       | Explain how the password is handled                     |
| [x ] #4  | 1       | Explain how the DB is utilized                          |

> #1:  the html accepts form for email and password. The form data is sent to the backend. Created functions check ff the email and password match an existing username and password in the database. If one of the required login forms is not correct, the user cannot login succesfully.

> #2:  the form data is handled via html element tags. The data is then data is sent form the front end to the back end. The backend uses various functions to check the typed in email and password. The functions return true or false for email and password checking. If tru, then successful login, If false, then unsuccessful login.

> #3: The password is sent to the backend. The password is sent as a hash to check for a preexisting hash for that same password. 

> #4: The database holds data for both email and password hash for existing users. The information form the database can be checked for this information to login a user if given the right email and password. If the email or password does not match what is in the database, then the user cannot login.

</ul></ul>
 
### Deliverable 3: Feature: Users will be able to logout (pts. 1)
<ul>

__SubTask 1:__ Add a **screenshot** showing the successful logout message. Message should show something about being logged out

<ul>

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  [successful logout](https://user-images.githubusercontent.com/95323815/204885535-54d40eb8-22b6-4fdd-997b-9938707be28f.png)

</ul>

__SubTask 2:__ Add a **screenshot** showing the logged out user can't access a login-protected page. Message should show something about not being logged in

<ul>

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  [not logged in](https://user-images.githubusercontent.com/95323815/204885802-c08fe54e-1a08-47f1-9773-cc7fa85daec0.png)


</ul>

__SubTask 3:__ Add the related pull request(s) for this feature

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): https://github.com/j0rdanbruce/IT202-007/pull/14

</ul> 

__SubTask 4:__ Explain briefly how the process/code works. Describe the session logic and how it's used for login

<ul>

> Explanation:  when a user logs in successfully, there is a sessionstart() function that is run. Upon successful logout, the session is destroyed. A new session starts and a flash message appears showing the user has successfully logged out. 

</ul></ul>

### Deliverable 4: Feature: Basic Security Rules and Roles Implemented (pts. 1)
<ul>

__SubTask 1:__ Add a **screenshot** showing the logged out user can't access a login-protected page (may be the same as similar request). Message should show something about not being logged in

<ul>

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  [security for accessing data](https://user-images.githubusercontent.com/95323815/204885802-c08fe54e-1a08-47f1-9773-cc7fa85daec0.png)

</ul>

__SubTask 2:__ Add a **screenshot** showing a user without an appropriate role can't access the role-protected page. Message should show something about not having proper role or permission (i.e., different than the not logged in message)

<ul>

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  


</ul>

__SubTask 3:__ Add a **screenshot** showing of the Roles table with valid data. Must have at least one valid record from the lessons (i.e., Admin)

<ul>

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  


</ul>

__SubTask 4:__ Add a **screenshot** showing the UserRole table with valid data. Caption which is your administrator

<ul>

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  


</ul>

__SubTask 5:__ Add the related pull request(s) for this feature

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): 

</ul> 

__SubTask 6:__ Explain briefly how the process/code works for login-protected pages. Explain how the session is used and any relevant helpers

<ul>

> Explanation:  

</ul>

__SubTask 7:__ Explain briefly how the process/code works for role-protected pages. Explain how the session is used and any relevant helpers

<ul>

> Explanation:  

</ul></ul>

### Deliverable 5: Feature: Site should have basic styles/theme applied; everything should be styled (pts. 1)
<ul>

__SubTask 1:__ Add a **screenshot** showing the successful logout message

<ul>

#### The checkboxes are for your own tracking
    
|    #    | Points | Details        |
| ------- | ------ | --------------:|
| [ x] #1  | 1      | Navigation should be styled |
| [ x] #2  | 1      | Forms should be styled |
| [x ] #3  | 1      | UI should be clean and not have my "hideous" example CSS |
| [ ] #4  | 1      | Data output should be in a clean manner (i.e., table, row/cols, list groups, etc).<br>Basically not exactly like dumped plaintext |

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> #1:  [navigation style](https://user-images.githubusercontent.com/95323815/205156836-0c7ccc52-7fb1-48ed-9ba7-5052a2ab2f22.png)

> #2:  [styled forms](https://user-images.githubusercontent.com/95323815/205157046-37c89584-03f6-4378-95bb-b927d59e34ac.png)

> #3:  [clean UI](https://user-images.githubusercontent.com/95323815/205157303-2d55331e-b575-4e42-aafc-2a41029abc1e.png)

> #4:  [clean data output format](https://user-images.githubusercontent.com/95323815/205157577-641074d0-2f6f-40f8-bfc4-b95832c97825.png)

</ul>

__SubTask 2:__ Add the related pull request(s) for this feature

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): https://github.com/j0rdanbruce/IT202-007/pull/30

</ul> 

__SubTask 3:__ Briefly explain your CSS at a high level. Highlight the basic styling you chose for the general elements like nav, forms, etc.

<ul>

> Explanation:   I turned the navigation bar horizontal. I added rounded edges to the corners of the navigation bar background. changed color of navigatio nbar background. Navigation links change color when mouse hovers over nagivation link. included placeholders inside the text boxes. rounded hte edges of the submit buttons. shaded in the submit button when clicked on to show that the button was pressed.

</ul>

### Deliverable 6: Feature: Any output messages/errors should be "user friendly" (pts. 1)
<ul>

__SubTask 1:__ Add **screenshots** showing of some examples of errors/messages

<ul>

#### The checkboxes are for your own tracking
    
|    #    | Points | Details        |
| ------- | ------ | --------------:|
| [ ] #1  | 1      | This can include previous screenshots of protected pages and/or validation messages. |
| [ ] #2  | 1      | Show at least 3 different "error" messages |

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> #1: [message when not logged in](https://user-images.githubusercontent.com/95323815/205158464-4335b58f-93dc-4696-8c9f-46762eafaeb9.png)

> #2:  [message when for incorrect email](https://user-images.githubusercontent.com/95323815/205158717-a322783b-54fe-4df4-b468-d9a0b31816b1.png)

</ul>

__SubTask 2:__ Add a related pull request(s)

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): https://github.com/j0rdanbruce/IT202-007/pull/32

</ul> 

__SubTask 3:__ Explain briefly how you made messages user friendly. Describe what we've been doing to handle techical messages and converting them to being friendly to our users

<ul>

> Explanation:  When the user attempts to login with either email or lgin name, the data is sent to the backend. There are functions that check for proper logname or proper email and for proper password hash. If any of those return as false when run in the function, the login attempt is unsuccessful and a flash message is displayed.

</ul></ul>

### Deliverable 7: Feature: Users will be able to see their profile (pts. 1)
<>

__SubTask 1:__ Add a **screenshot** showing the successful logout message. Email and Login Name should prefill properly.

<ul>

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  [prefilled user data](https://user-images.githubusercontent.com/95323815/205159626-394057d7-b28a-49ee-adce-e064182e3d40.png)

</ul>

__SubTask 2:__ Add the related pull request(s) for this feature

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): https://github.com/j0rdanbruce/IT202-007/pull/29

</ul>

__SubTask 3:__ Explain briefly how the process/code works (view only). Only talk about how the data is retrieved about the user and displayed in the form

<ul>

> Explanation:  If login is successful, the form data auto inputs the email logName of the user in the specific users profile page.

</ul></ul>

### Deliverable 8: Feature: User will be able to edit their profile (pts. 1)
<ul>

__SubTask 1:__ Add **screenshots** of the User Profile page validation messages and success messages

<ul>

#### The checkboxes are for your own tracking
    
|    #    | Points | Details        |
| ------- | ------ | --------------:|
| [ ] #1  | 1      | Show Login Name validation message          |
| [ ] #2  | 1      | Show email validation message               |
| [ ] #3  | 1      | Show password validation message            |
| [ ] #4  | 1      | Show password mismatch message              |
| [ ] #5  | 1      | Show email/Login Name already in use message  |

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> #1:  [changed login name successfully](https://user-images.githubusercontent.com/95323815/205160694-02f6b9df-75cb-47d6-9ed1-1127efce7dc0.png)

> #2:  

> #3:  [password reset validation message](https://user-images.githubusercontent.com/95323815/205160982-b254543c-1777-417b-a827-2c686e58c3bb.png)

> #4:  [password mismatch flash message](https://user-images.githubusercontent.com/95323815/205161414-4d981f89-849d-4a8e-8ded-1ac8815fad63.png)

> #5:  [login name already in use](https://user-images.githubusercontent.com/95323815/205161510-f9ac1925-23f3-428d-899a-b8c38d8ed1ec.png)

</ul>

__SubTask 2:__ Add before and after **screenshots** showing the User table when a user edits their profile

<ul>

#### The checkboxes are for your own tracking
    
|    #    | Points | Details        |
| ------- | ------ | --------------:|
| [ ] #1  | 1      | There should be two screenshots          |
| [ ] #2  | 1      | It should be highlighted or note which record changes <br>between both screenshots along with what changed |

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> #1:  [before user changes logName](https://user-images.githubusercontent.com/95323815/205161863-23cf2efa-1bc6-4d35-a49a-f3bbaa6dc0e9.png)

> #2:[after logname is changed](https://user-images.githubusercontent.com/95323815/205162157-19866db0-77f1-4976-96b2-9204e10f1e69.png)

</ul>

__SubTask 3:__ Add the related pull request(s) for this feature

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): https://github.com/j0rdanbruce/IT202-007/pull/29

</ul> 

__SubTask 4:__ Explain briefly how the process/code works (edit only). Talk about how the edit logic is handled for updating email, logName, and password (don't forget to briefly mention the validation)


<ul>

> Explanation:  the user table added a column for logName. The register page updated to allow form to input logname. the information is sent to the backend. sql scripts add user data for logname to the current users data in the servers. Changes made to logname or password are altered in the sql tables on the servers that host the user information.

</ul></ul>

### Deliverable 9: Issues and Project Board (pts. 2)
<ul>

__SubTask 1:__ Add **screenshots** showing which issues are done/closed (project board)
Incomplete Issues should not be closed

<ul>

#### The checkboxes are for your own tracking
    
|    #    | Points | Details        |
| ------- | ------ | --------------:|
| [ ] #1  | 1      | At least one issue item per Milestone feature |
| [ ] #2  | 1      | Show from the Project Board perspective (may need multiple screenshots) |

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> #1:  

> #2:  [project board](https://user-images.githubusercontent.com/95323815/205164435-a102ce72-1374-48fc-ab01-862e62b538a5.png)

</ul>

__SubTask 2:__ Include a direct link to your Project Board. URL should end in /project/# (likely 1, but the number isn't important)

<ul>

> URL:  https://github.com/users/j0rdanbruce/projects/1

</ul>

__SubTask 3:__ Prod Application Link to Login Page. Link must be from the NJIT webserver prod folder to your application's login

<ul>

#### Required url pattern: https?://web.njit.edu/.+-prod.*

> URL: https://web.njit.edu/~jeb79/jeb79-prod/Project/login.php

</ul> </ul>
