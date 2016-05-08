local config = require("lapis.config").get()

-- Autoload
package.path = table.concat({
    package.path,
    config.app_directory,
}, ";")

local lapis = require("lapis")
local app = lapis.Application()
local Genre = require("model.genre").Genre
local Tag = require("model.tag").Tag
local Asset = require("model.asset").Asset
local Image = require("model.asset").Image
local response = require("parts.response").response
local helper = require("parts.helper").helper
local db = require("lapis.db")

-- Genres api endpoints.
app:get("/api/1.0/genres(/:genre_id)", function(self)
    local data
    local limit = config.default_entity_limit
    response.prepareHeaders(self)
    if self.params.genre_id == nil then
        if self.params.limit ~= nil then
            limit = self.params.limit
        end
        data = Genre:select("LIMIT ?", tonumber(limit))
    else
        data = Genre:select("WHERE id = ?", self.params.genre_id)
    end

    return response.success(data)
end)

-- Tags api endpoints.
app:get("/api/1.0/tags(/:tag_id)", function(self)
    local data
    local limit = config.default_entity_limit
    response.prepareHeaders(self)
    if self.params.tag_id == nil then
        if self.params.limit ~= nil then
            limit = self.params.limit
        end
        data = Tag:select("LIMIT ?", tonumber(limit))
    else
        data = Tag:select("WHERE id = ?", self.params.tag_id)
    end

    return response.success(data)
end)

-- Assets api endpoints.
app:get("/api/1.0/assets(/:id)", function(self)
  return "Welcome to Lapis " .. require("lapis.version")
end)

app:get("/api/1.0/assets(/tag(/:tag_id))", function(self)
    local res = db.select("* from assets a  \
        inner join images img ON img.id = a.image_id where a.id = ? \
        ", 1)

    return response.success(res)
end)

app:get("/api/1.0/assets(/genre(/:genre_id))", function(self)
    return "Genre"
end)

-- Error handler.
app.handle_404 = function(self)
    local errors = {"Failed to find route: " .. self.req.cmd_url}
    return response.error(404, errors);
end

return app
