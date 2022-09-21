ARG REGISTRY=registry.e-gps.tw
FROM ${REGISTRY}/builder:1.1.2 as builder

COPY ./ /app

RUN sh /docker-entrypoint.sh

ARG REGISTRY=registry.e-gps.tw
FROM ${REGISTRY}/lnp:1.2.0

WORKDIR /var/www/html

COPY --from=builder --chown=www-data /app /var/www/html
COPY --chown=www-data ./docker-entrypoint.sh /docker-entrypoint.sh

# Make sure files/folders needed by the processes are accessable when they run under the www-data user
RUN chown -R www-data.www-data /run && \
    chown -R www-data.www-data /var/www && \
    chown -R www-data.www-data /usr/lib/nginx && \
    chown -R www-data.www-data /var/log/nginx && \
    rm -rf /etc/nginx/conf.d/*

RUN chmod 700 /docker-entrypoint.sh

USER www-data

CMD ["sh", "-c", "/docker-entrypoint.sh"]
