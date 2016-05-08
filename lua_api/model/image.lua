local Model = require("lapis.db.model").Model
local Image = Model:extend("images", {
    primary_key = "id"
})

return {
    Image = Image
}