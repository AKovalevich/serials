local helper = {}

helper.arrayCount = function(array)
    local int = 0
    if type(array) ~= 'table' then
        return int;
    end
    for k,v in pairs(array) do
        int = int + 1
    end
    return table.getn(array)
end


return {
    helper = helper
}
