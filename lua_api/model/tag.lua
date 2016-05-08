local Model = require("lapis.db.model").Model
local Tag = Model:extend("tags", {
    primary_key = "id"
})

return {
    Tag = Tag
}
