# IT202 Milestone2 Bank Project (pts. 10.00)
## Instructions
1. Checkout Milestone2 branch
2. Create a milestone2.md file in your Project folder
3. git add/commit/push this empty file to Milestone2 branch (you'll need the link later)
4. Fill in the deliverable items
5. At the end copy the markdown and paste it into milestone2.md
6. git add/commit/push the md file to Milestone2
7. Do a Pull Request on GitHub between Milestone2 and dev. Then verify.
8. Do a Pull Request from dev to prod. Then verify.
9. Checkout dev locally and pull changes to get ready for Milestone 3.
10. Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas.
Note: Ensure all images appear properly on GitHub and everywhere else. Images are only accepted from dev or prod branches. All website links must be from NJIT's webserver from the prod URL. (you can assume/infer this by getting your dev URL and changing dev to prod).
## Desired Branch Name
### Milestone 2
## Deliverables
---
### Deliverable 1: Create Accounts table and setup (pts. 1.5)
<ul>

__SubTask 1:__ Add a **screenshot** from the db of the system user (User table)

<ul>

#### Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  [system user](https://user-images.githubusercontent.com/95323815/208328975-7d171009-ed58-425c-9983-9cab9e266041.png)

</ul>

__SubTask 2:__ Add **screenshot** from the db of the world account (Accounts table).

<ul>

#### Make sure if the  **screenshot**  contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  [world account](https://user-images.githubusercontent.com/95323815/208329103-f1791d62-9242-4ee2-b1b1-a72164d5b633.png)

</ul>

__SubTask 3:__ Explain the purpose and usage of these two entries and how they relate

<ul>

> Explanation:  The system user is a user account for the world checking account. The id of the system user is a foreign key reference to userID of the worl checking account. The world checking account is the only checking account of the system user. The world checking account represents money that is being transferred to and from any account that is associated with the banking app.

</ul>

__SubTask 4:__ Add the related pull request link(s)

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): https://github.com/j0rdanbruce/IT202-007/pull/37/commits/5b14160f8be8b6a1fcc600e41ff59e3e868ae3cb

</ul></ul>

### Deliverable 2: Dashboard (pts. 1.5)
<ul>

__SubTask 1:__ Add a **screenshot** showing the requested links/navigation

<ul>

#### The checkboxes are for your own tracking
    
|    #    | Points | Details        |
| ------- | ------ | --------------:|
| [ ] #1  | 1      | Links in the navbar don't count (it's ok if some are duplicated here and navbar) |

<br>

#### Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:   [dashboard](https://user-images.githubusercontent.com/95323815/208329718-51e326b1-697c-41ef-9ce5-d6494aefff9c.png)

</ul>

__SubTask 2:__ Explain which ones are working for this milestone

<ul>

> Explanation:  all links to the respective page are working and redirect you to the proper page when clicked.
(https://user-images.githubusercontent.com/95323815/208329969-6b8d00cd-a6f0-481f-8925-404142995049.png)


</ul>

__SubTask 3:__ Add the related pull request link(s)

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): https://github.com/j0rdanbruce/IT202-007/pull/38

</ul></ul>

### Deliverable 3: Create a checking Account (pts. 1.5)
<ul>

__SubTask 1:__ Add a **screenshot** showing the Create Account Page. Have valid data filled in

<ul>

#### Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  [create checking account page](https://user-images.githubusercontent.com/95323815/208330261-ab846d77-cc60-48fe-ab7c-9629d91515b0.png)

</ul>

__SubTask 2:__ Add screenshots showing validation errors and success message

<ul>

#### The checkboxes are for your own tracking
     
|    #    | Points | Details                                       |
| ------- | ------ | ---------------------------------------------:|
| [ ] #1  | 1      | Show the minimum                              |
| [ ] #2  | 1      | Show the success message from task 1's data   |

> #1:  [successful creation of cecking account](https://user-images.githubusercontent.com/95323815/208330335-98c4c4be-7ff8-403d-928f-3c4051356c2a.png)

> #2:  [initial deposit must be greater than or equal to 10 dollars](https://user-images.githubusercontent.com/95323815/208330528-417c7cf7-edba-4c4e-830a-8e3be9bdeaca.png)

</ul>
 
__SubTask 3:__ Add a **screenshot** showing the transaction generated from the initial deposit (from the DB). Clearly highlight or mention in the caption which to look at

<ul>

<br>

#### Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:  [2 successful creations of checking accounts by user 3 with deposits >= $10](https://user-images.githubusercontent.com/95323815/208330821-102f3286-fc10-4e14-a1aa-315014d25be7.png)


</ul>

__SubTask 4:__ Explain which account number generation you used and the account creation
process including the transaction logic.

<ul>

#### The checkboxes are for your own tracking
     
|    #    | Points | Details                                       |
| ------- | ------ | ---------------------------------------------:|
| [ ] #1  | 1      | Clearly mention the option number and the text from the proposal |
| [ ] #2  | 1      | Clearly explain the full steps                |

> Explanation:  I used the auto-increment feature for ".sql" files. However, thinking about it now, the account id should not just auto increment. The way i have it set up is that it just auto-increments all created checking accounts. Instead, I should implement a feature that checks which user is currently logged in. The id of the checking account should auto-increment based on number of already existing checking id's of the current user.

</ul>

__SubTask 5:__ Add the related pull request link(s)

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): [create account](https://github.com/j0rdanbruce/IT202-007/pull/37/commits/4633d043c72f98fd274b370abfbce7266b995664)

</ul> 


__SubTask 6:__ Add a direct link to NJIT's webserver prod for this file

<ul>

#### Required url pattern: https?://web.njit.edu/~.+-prod/*

> URL(s): 

</ul></ul>

### Deliverable 4: User will be able to list their accounts (pts. 1.5)
<ul>

__SubTask 1:__ Add a **screenshot** showing the user's account list view (show 5 accounts)

<ul>

#### The checkboxes are for your own tracking
    
|    #    | Points | Details                                                  |
| ------- | ------ | --------------------------------------------------------:|
| [ ] #1  | 1      | There should be at least 5                               |
| [ ] #2  | 1      | Show account number, account type, modified, and balance |

<br>

#### Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:   

</ul>

__SubTask 2:__ Briefly explain how the page is displayed and the data lookup occurs.

<ul>

> Explanation:   

</ul>

__SubTask 3:__ Add the related pull request link(s)

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): 

</ul> 

__SubTask 4:__ Add a direct link to NJIT's webserver prod for this file

<ul>

#### Required url pattern: https?://web.njit.edu/~.+-prod/*

> URL(s): 

</ul></ul>

### Deliverable 5: Account Transaction Details (pts. 1.5)
<ul>

__SubTask 1:__ Add a **screenshot** of an account's transaction history

<ul>

#### The checkboxes are for your own tracking
    
|    #    | Points | Details                                                  |
| ------- | ------ | --------------------------------------------------------:|
| [ ] #1  | 1      | Should have at least a few samples                       |
| [ ] #2  | 1      | Account: Show account number, account type, balance, opened/created date of the selected account (from Accounts table) |
| [ ] #3  | 1      | Transactions: Show the src/dest account numbers (not account id), the transaction type, the change in balance, when it occurred, expected total, and the memo |

<br>

#### Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:   

</ul>


__SubTask 2:__ Explain how the lookup and display occurs.

<ul>

> Explanation:   

</ul>

__SubTask 3:__ Add the related pull request link(s)

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): 

</ul> 

__SubTask 4:__ Add a direct link to NJIT's webserver prod for this file

<ul>

#### Required url pattern: https?://web.njit.edu/~.+-prod/*

> URL(s): 

</ul></ul>

### Deliverable 6: Deposit/Withdraw (pts. 1.5)
<ul>

__SubTask 1:__ Add a **screenshot** of the Deposit Page. Show valid data filled in.

<ul>

<br>

#### Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:   

</ul>

__SubTask 2:__ Add a **screenshot** of the Withdraw Page (this potentially can be the same page with different views)

<ul>

<br>Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:   

</ul>

__SubTask 3:__ Add a **screenshot** of a validation error for negative numbers

<ul>

<br>

#### Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:   

</ul>

__SubTask 4:__ Add a **screenshot** of a validation error for withdrawing more than the account contains

<ul>

<br>Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:   

</ul>

__SubTask 5:__ Show two **screenshots** of success messages for a deposit and awithdrawal

<ul>

<br>

#### Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:   

</ul>

__SubTask 6:__ Add a **screenshot** of the transaction pairs in the DB for the above tests

<ul>

#### The checkboxes are for your own tracking
    
|    #    | Points | Details                                                  |
| ------- | ------ | --------------------------------------------------------:|
| [ ] #1  | 1      | Expected total should be accurate for both accounts |
| [ ] #2  | 1      | Highlight or mention in caption which records to look at |

<br>

#### Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot:   

</ul>


__SubTask 7:__ Briefly explain how transactions work.

<ul>

> Explanation:   

</ul>

__SubTask 8:__ Add the related pull request link(s)

<ul>

#### Required url pattern: https?://github.com/(?:[^/.]+/)+(?:pull/.+)

> URL(s): 

</ul> 

__SubTask 9:__ Add a direct link to NJIT's webserver prod for this file

<ul>

#### Required url pattern: https?://web.njit.edu/~.+-prod/*

> URL(s): 

</ul></ul>


### Deliverable 7: Misc (pts. 2)
<ul>

__SubTask 1:__ Add **screenshots** showing which issues are done/closed (project board)

<ul>

#### The checkboxes are for your own tracking
    
|    #    | Points | Details        |
| ------- | ------ | --------------:|
| [ ] #1  | 1      | Incomplete Issues should not be closed |
| [ ] #2  | 1      | Should be from project board |
| [ ] #3  | 0      | May require multiple images |
| [ ] #4  | 1      | In the caption briefly explain any incomplete items |

<br>

#### Make sure if the **screenshot** contains code that you have a relevant comment with your ucid, date, and explanation of what you're attempting, if not max grade for this item is 75%.
#### Provide a Github URL to each **screenshot** you've uploaded with a caption
> Screenshot(s):

</ul>

__SubTask 2:__ Add a link to your NJIT webserver prod projects login page

<ul>

#### Required url pattern: https?://web.njit.edu/.+-prod.*

> URL: 

</ul></ul>