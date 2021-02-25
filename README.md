## GraphQL CMS Demo

This is a basic Silverstripe CMS installation that can
be used as a backend for a decoupled project. It includes
a handful of really simple models that express relationships
that can be queried, filtered, sorted, and mutated in
the GraphQL API.

### Models
* ProductPage
  * has_many Product
    * has_many Review
      * has_one Author (Member)


### Installation

`$ composer install`
`vendor/bin/sake dev/graphql/build clear=1`

### Seeding content

Just go to a page and put `?seed=1` in the URL. 😂

### Test your queries

Go go `/dev/graphql/ide` in the browser

### Example query

```
query {
  readProductPages {
    nodes {
      products(
        filter: {
        	price: { gt: 20 }
      	},
        sort: { lastEdited: DESC }
      ) {
        nodes {
          title
          reviews(filter: {
            author:{
              firstName: { startswith: "a" }
            }
          }) {
            nodes {
              id
              content
              rating
            }
          }
        }
      }
    }
  }
}
```
