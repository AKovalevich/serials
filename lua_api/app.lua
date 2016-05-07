local config = require("lapis.config").get()

-- Autoload
package.path = table.concat({
    package.path,
    config.app_directory,
}, ";")

local lapis = require("lapis")
local app = lapis.Application()
local Genre = require("model.genre").Genre

-- Genre api endpoints.
app:get("/api/1.0/genres(/:genre_id)", function(self)
    local data

    -- @TODO: Validate some params.

    if self.params.genre_id == nil then
        data = Genre:select();
    else
        data = Genre:find(self.params.genre_id)
    end

    return  { json = { status = status, data = data} }
end)

-- Assets api endpoints.
app:get("/api/1.0/assets(/:id)", function(self)
  return "Welcome to Lapis " .. require("lapis.version")
end)

return app
