local Model = require("lapis.db.model").Model
local Genre = Model:extend("genres", {
    primary_key = "id"
})

return {
    Genre = Genre
}