local Model = require("lapis.db.model").Model
local Asset = Model:extend("assets", {
    primary_key = "id",
    relations = {
        {"user", belongs_to = "Users"}
    }
})

return {
    Asset = Asset
}
