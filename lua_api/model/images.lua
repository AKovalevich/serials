local Model = require("lapis.db.model").Model
local Images = Model:extend("images", {
    primary_key = "id"
})

return {
    Images = Images
}