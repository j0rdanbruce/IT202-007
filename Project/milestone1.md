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
| [ ] #1  | 1      | Show invalid email validation |
| [ ] #2  | 1      | Show invalid password validation |
| [ ] #3  | 1      | Show passwords not much validation |
| [ ] #4  | 1      | Show email not available validation (already registered) |
| [ ] #5  | 1      | Show Login Name not available validation (logName is taken) |
| [ ] #6  | 1      | Show the form with valid data filled in before the form is submitted |

#### Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> #1:  

> #2: 

> #3: 

> #4: 

> #5: 

> #6: 

</ul>

__SubTask 2:__ Add **screenshot** of the User table with data in it. The valid user data from Task 1 should be present in this **screenshot**. Clearly highlight which row it is.

<ul>

#### Make sure if the  **screenshot**  contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  

</ul>

__SubTask 3:__ Add the related pull request(s) for this feature

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): 

</ul> 

__SubTask 4:__ Explain briefly how the process/code works (to register)

<ul>

#### The checkboxes are for your own tracking
     
|    #     | Points | Details                                                  |
| -------- | ------ | --------------------------------------------------------:|
| [ ] #1  | 1       | Explain how the form is handled and behaves             |
| [ ] #2  | 1       | Explain the validation logic (frontend and backend)     |
| [ ] #3  | 1       | Explain how the password is handled                     |
| [ ] #4  | 1       | Explain how the DB is utilized                          |

> #1:  

> #2:  

> #3: 

> #4: 

</ul></ul>

### Deliverable 2: Feature: User will be able to login to their account (pts. 1)
<ul>

__SubTask 1:__ Add one or more **screenshots** of the application showing the form and
validation errors per the feature requirements

<ul>

#### The checkboxes are for your own tracking
    
|    #    | Points | Details        |
| ------- | ------ | --------------:|
| [ ] #1  | 1      | Show password mismatch validation (doesn't match what's in the DB) |
| [ ] #2  | 1      | Show validation based on non-existing user |

<br>Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> #1:  

> #2: 

</ul>

__SubTask 2:__ Add a **screenshot** of successful login

<ul>

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  


</ul>

__SubTask 3:__ Add the related pull request(s) for this feature

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): 

</ul> 

__SubTask 4:__ Explain briefly how the process/code works (to login)

<ul>

#### The checkboxes are for your own tracking
     
|    #     | Points | Details                                                  |
| -------- | ------ | --------------------------------------------------------:|
| [ ] #1  | 1       | Explain how the form is handled and behaves             |
| [ ] #2  | 1       | Explain the validation logic (frontend and backend)     |
| [ ] #3  | 1       | Explain how the password is handled                     |
| [ ] #4  | 1       | Explain how the DB is utilized                          |

> #1:  

> #2:  

> #3: 

> #4: 

</ul></ul>
 
### Deliverable 3: Feature: Users will be able to logout (pts. 1)
<ul>

__SubTask 1:__ Add a **screenshot** showing the successful logout message. Message should show something about being logged out

<ul>

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  

</ul>

__SubTask 2:__ Add a **screenshot** showing the logged out user can't access a login-protected page. Message should show something about not being logged in

<ul>

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  


</ul>

__SubTask 3:__ Add the related pull request(s) for this feature

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): 

</ul> 

__SubTask 4:__ Explain briefly how the process/code works. Describe the session logic and how it's used for login

<ul>

> Explanation:  

</ul></ul>

### Deliverable 4: Feature: Basic Security Rules and Roles Implemented (pts. 1)
<ul>

__SubTask 1:__ Add a **screenshot** showing the logged out user can't access a login-protected page (may be the same as similar request). Message should show something about not being logged in

<ul>

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  

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
| [ ] #1  | 1      | Navigation should be styled |
| [ ] #2  | 1      | Forms should be styled |
| [ ] #3  | 1      | UI should be clean and not have my "hideous" example CSS |
| [ ] #4  | 1      | Data output should be in a clean manner (i.e., table, row/cols, list groups, etc).<br>Basically not exactly like dumped plaintext |

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> #1:  

> #2:  

> #3:  

> #4:  

</ul>

__SubTask 2:__ Add the related pull request(s) for this feature

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): 

</ul> 

__SubTask 3:__ Briefly explain your CSS at a high level. Highlight the basic styling you chose for the general elements like nav, forms, etc.

<ul>

> Explanation:   

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
> #1: 

> #2:  

</ul>

__SubTask 2:__ Add a related pull request(s)

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): 

</ul> 

__SubTask 3:__ Explain briefly how you made messages user friendly. Describe what we've been doing to handle techical messages and converting them to being friendly to our users

<ul>

> Explanation:  

</ul></ul>

### Deliverable 7: Feature: Users will be able to see their profile (pts. 1)
<>

__SubTask 1:__ Add a **screenshot** showing the successful logout message. Email and Login Name should prefill properly.

<ul>

Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  

</ul>

__SubTask 2:__ Add the related pull request(s) for this feature

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): 

</ul>

__SubTask 3:__ Explain briefly how the process/code works (view only). Only talk about how the data is retrieved about the user and displayed in the form

<ul>

> Explanation:  

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
> #1:  

> #2:  

> #3:  

> #4:  

> #5:  

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
> #1:  

> #2:

</ul>

__SubTask 3:__ Add the related pull request(s) for this feature

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): 

</ul> 

__SubTask 4:__ Explain briefly how the process/code works (edit only). Talk about how the edit logic is handled for updating email, logName, and password (don't forget to briefly mention the validation)


<ul>

> Explanation:  

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

> #2:  

</ul>

__SubTask 2:__ Include a direct link to your Project Board. URL should end in /project/# (likely 1, but the number isn't important)

<ul>

> URL:  

</ul>

__SubTask 3:__ Prod Application Link to Login Page. Link must be from the NJIT webserver prod folder to your application's login

<ul>

#### Required url pattern: https?://web.njit.edu/.+-prod.*

> URL: 

</ul> </ul>
