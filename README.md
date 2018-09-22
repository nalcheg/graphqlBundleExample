**Query for tickets with comments:**
```
{
  tickets_list {
    tickets {
      id
      reason
      user {
        id
        login
        name
      }
      comments {
        id
        user {
          id
        }
        comment
      }
    }
  }
}
```
**Create ticket mutation:**
```
mutation {
  CreateTicket(input: {user_id: 1, reason: "becouse"}) {
    id
    user{
      id
      login
      name
    }
    reason
  }
}
```
**Create ticket comment mutation:**
```
mutation {
  CreateTicketComment(input: {ticket_id: 2, user_id: 1, comment: "newComment"}) {
    id
  }
}
```
