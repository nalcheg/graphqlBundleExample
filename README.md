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
